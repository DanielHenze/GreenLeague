<?php

class userAPI extends rAPI {
	protected $_ACTIVE_USER;

	public function __construct($_User){
		$this->_ACTIVE_USER = $_User;
	}

	public function init(){
		return rAPI::getUserIdFromRiot("_USER", $this->_ACTIVE_USER);
	}
}