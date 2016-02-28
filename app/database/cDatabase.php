<?php

class cDatabase {

	private $_Summoner;
	private $_Config;
	private $_CONNECTION = false;
	public $_UserResult;

	public function __construct($_Summoner){
		$this->_Summoner = $_Summoner;
		$this->_Config = include($_SERVER["DOCUMENT_ROOT"]."/leagueofslat/assets/config/db.php");

		$this->_CONNECTION = new PDO('mysql:host='.$this->_Config["host"].';dbname='.$this->_Config["database"], $this->_Config["user"], $this->_Config["pw"]);
	}

	public function checkUser(){
		$_USER_QUERY = "SELECT * FROM `riot_summoner` WHERE `hiddenName` = \"".$this->_Summoner."\"";
		#echo $_USER_QUERY;
		$result = $this->_CONNECTION->query($_USER_QUERY)->fetchAll(PDO::FETCH_ASSOC);
		if($result){
			$this->_UserResult = $result;
			return true;
		}else{
			return false;
		}


	}

	public function insetUser($_aUser){
		$_USER_QUERY = "INSERT INTO `riot_summoner`(`id`, `region`, `hiddenName`, `name`, `profileIconId`, `summonerLevel`, `revisionDate`) 
						VALUES 
						(".$_aUser["id"].",\"".$_aUser["region"]."\",\"".$_aUser["hiddenName"]."\",\"".$_aUser["name"]."\",".$_aUser["profileIconId"].",".$_aUser["summonerLevel"].",".$_aUser["revisionDate"].")";
		# Inset Into Database
		$_insert = $this->_CONNECTION->query($_USER_QUERY);

		# After Insert get the Informations and set the global _UserResult
		$_USER__SELECT_QUERY = "SELECT * FROM `riot_summoner` WHERE `hiddenName` = \"".$_aUser["hiddenName"]."\"";
		$result = $this->_CONNECTION->query($_USER__SELECT_QUERY)->fetchAll(PDO::FETCH_ASSOC);
		$this->_UserResult = $result;
		return true;
	}

	public function updateUser(){

	}

	public function getUser(){
		return $this->_UserResult;
	}
}
