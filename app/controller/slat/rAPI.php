<?php 
class rAPI {


# The Magician-Class - Slat

protected $_ACTIVE_REGION;

# Non-Region Specific CURLS from the API 
protected $_API 			= ["_CHAMPION_STATS_ALL" => "https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?champData=all&api_key={API_KEY}"]; // Return All Champions

# Region Specific CURLS from the API
protected $_API_REGION 		= [	"EUW" 
								=> ["_FEATURED_GAMES" => "https://euw.api.pvp.net/observer-mode/rest/featured", 						# Needs API-Key
									"_SERVER_STATUS_INFORMATIONS" => "http://status.leagueoflegends.com/shards/euw", 					# Do not need API-Key
									"_USER" => "https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/", 							# First User Name then API-Key (Example: by-name/FX Slatyo?api_key=xxx or by-name/FX Slatyo,eviscero?api_key=xxx )
									"_USER_WHOLE_LEAGUE" => "https://euw.api.pvp.net/api/lol/euw/v2.5/league/by-summoner/", 			# Need to call by Summoner-ID (Example: by-summoner/123456?api_key)
									"_USER_ONLY_LEAGUE_INFORMATIONS" => "https://euw.api.pvp.net/api/lol/euw/v2.5/league/by-summoner/", # Add Summonder-ID AND API_KEY_ENTRY
									"_USER_MATCH_HISTORY" => "https://euw.api.pvp.net/api/lol/euw/v1.3/game/by-summoner/", 				# Add Summoner-ID and API_KEY_RECENT
									"_USER_CURRENT_MATCH" => "https://euw.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/EUW1/", # First User ID then API-Key 
									"_CHALLENGER_SOLO" => "https://euw.api.pvp.net/api/lol/euw/v2.5/league/challenger?type=RANKED_SOLO_5x5&api_key={API_KEY}" # Do not need API-Key external (Can't handle it)
									], 
								"EUNE" 
								=> [],
								"NA" 
								=> []
							  ];

# API-Key which is needed for each Request
protected $_API_KEY			= "?api_key={API_KEY}";
protected $_API_KEY_ENTRY 	= "/entry?api_key={API_KEY}"; # For _USER_ONLY_LEAGUE_INFORMATIONS
protected $_API_KEY_RECENT 	= "/recent?api_key={API_KEY}"; # For _USER_MATCH_HISTORY

# API-Request-Command (Example: _SERVER_STATUS_INFORMATIONS)
protected $_API_COMMAND;

# Response from API-Request
protected $_API_JSON_RESPONSE	= [];
protected $_API_CONVERT_RESPONSE = [];



	public function __construct($_REGION = "EUW"){
		$this->_ACTIVE_REGION = $_REGION;
	}

	#########################################################
	#														#
	#	@Description: 	set the Magic which slat should do 	#
	#	@Params:		(array) $_doMagic 					#
	#	@_doMagic:		contains Riot-Game API Informations # 
	#				For Example: _FEATURED				 	#
	#														#
	#########################################################

	public function returnMagic($_COMMAND){
		# Set active API command
		$this->_API_COMMAND = $_COMMAND;

		# Get response and put raw output into API_JSON_RESPONSE
		$this->_API_JSON_RESPONSE[$this->_API_COMMAND] = $this->riotApiResponseHttp($this->_API_REGION[$this->_ACTIVE_REGION][$this->_API_COMMAND]);

		# Convert response
		$this->_API_CONVERT_RESPONSE[$this->_API_COMMAND] = json_decode($this->_API_JSON_RESPONSE[$this->_API_COMMAND]);
		
		# Return converted response
		return $this->_API_CONVERT_RESPONSE[$this->_API_COMMAND];
	}

	protected function getUserIdFromRiot($_COMMAND, $_USER){
		# Set active API command
		$this->_API_COMMAND = $_COMMAND;

		if(!isset($this->_ACTIVE_REGION)){
			$this->_ACTIVE_REGION = "EUW";
		}

		# User String
		$_STRING = $this->_API_REGION[$this->_ACTIVE_REGION][$this->_API_COMMAND];
		$_STRING .= $_USER."/".$this->_API_KEY;
		#echo $_STRING;
		# Get response and put raw output into API_JSON_RESPONSE
		$this->_API_JSON_RESPONSE[$this->_API_COMMAND] = $this->riotApiResponseHttps($_STRING);
		$this->_API_CONVERT_RESPONSE[$this->_API_COMMAND] = json_decode($this->_API_JSON_RESPONSE[$this->_API_COMMAND]);
		return $this->_API_CONVERT_RESPONSE[$this->_API_COMMAND];
	}

	# CURL-Management
	private function riotApiResponseHttps($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return ($httpcode >= 200 && $httpcode < 300) ? $data : false;
	}

	private function riotApiResponseHttp($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		return ($httpcode >= 200 && $httpcode < 300) ? $data : false;
	}
}
