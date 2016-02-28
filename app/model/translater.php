<?php

class translater {

	# EN_GB
	# DE_DE
	
	private $_Language;
	private $_Translated;

	private $_prepText = [	"DE_DE"
							=> ["Beschw&ouml;rer ..." => "Beschw&ouml;rer ...",
								"online" => "online",
								"offline" => "offline",
								"DE_DE" => "Deutsch",
								"EN_GB" => "Englisch",
								"FR_FR" => "Franz&ouml;sisch",
								"Beschw&ouml;rer bitte ausf&uuml;llen." => "Beschw&ouml;rer bitte ausf&uuml;llen.",
								"Aktuell nur EUW Unterst&uuml;tzung." => "Aktuell nur EUW Unterst&uuml;tzung.",
								"Sprache" => "Sprache"],

							"EN_GB" 
							=> ["Beschw&ouml;rer ..." => "Summoner ...",
								"online" => "online",
								"offline" => "offline",
								"DE_DE" => "German",
								"EN_GB" => "English",
								"FR_FR" => "France",
								"Beschw&ouml;rer bitte ausf&uuml;llen." => "Please fill Summoner.",
								"Aktuell nur EUW Unterst&uuml;tzung." => "Currently only EUW support.",
								"Sprache" => "Language"],

							"FR_FR" 
							=> ["Beschw&ouml;rer ..." => "Summoner ...",
								"online" => "en ligne",
								"offline" => "déconnecté",
								"DE_DE" => "Allemand",
								"EN_GB" => "Anglais",
								"FR_FR" => "Fran&ccedil;ais",
								"Beschw&ouml;rer bitte ausf&uuml;llen." => "S\'il vous plait remplir Summoner.",
								"Aktuell nur EUW Unterst&uuml;tzung." => "Actuellement, seul le soutien EUW.",
								"Sprache" => "Langue"]
							];
	
	# Deutsch Ausgangssprache
	public function __construct($_Language){
		$this->_Language = $_Language;
	}

	public function translate($_str){
		$this->_Translated = $_str;

		return $this->_prepText[$this->_Language][$_str];
	}

	private function translateString(){

	}
}