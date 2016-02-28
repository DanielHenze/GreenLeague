<?php 
if(session_status() == PHP_SESSION_STATUS){
	session_start();
}
	if(isset($_GET)){
		# l = Language
		if(isset($_GET["l"])){
			$_SESSION["Language"] = $_GET["l"];
		}

		# r = Region
		if(isset($_GET["r"])){
			$_SESSION["Region"] = $_GET["r"];
		}
	}

	# Set Standard-Language
	if(!isset($_SESSION["Language"])){
		$_SESSION["Language"] = "EN_GB";
	}

	if(!isset($_SESSION["Region"])){
		$_SESSION["Region"] = "EUW";
	}

	# Get AutoLoader
	require_once("aLoad.php");

	# Include RiotAPI-Controller
	$API = new rAPI();
	$__ = new translater($_SESSION["Language"]);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Green League</title>
	</head>
	<body>
		<div class="content-wrap">

			<nav class="navbar navbar-default">
			  	<div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    	<div class="navbar-header">
			      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
			        		<span class="sr-only">Toggle navigation</span>
			        		<span class="icon-bar"></span>
			        		<span class="icon-bar"></span>
			        		<span class="icon-bar"></span>
			      		</button>
			      		<a class="navbar-brand" href="#">Brand</a>
			    	</div>

			    	<!-- Collect the nav links, forms, and other content for toggling -->
			    	<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">

			      	<ul class="nav navbar-nav navbar-right">
			        	<!-- Examplelink <li><a href="#">Link</a></li> -->
			        	<li class="dropdown">
			          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $__->translate("Sprache") ?> <span class="caret"></span></a>
			          		<ul class="dropdown-menu">
								<li><a href="?l=DE_DE"><?php print $__->translate("DE_DE") ?><img src="assets/img/flags/Germany.png"></a></li>
								<li><a href="?l=FR_FR"><?php print $__->translate("FR_FR") ?><img src="assets/img/flags/France.png"></a></li>
								<li><a href="?l=EN_GB"><?php print $__->translate("EN_GB") ?><img src="assets/img/flags/GreatBritain.png"></a></li>
			          		</ul>
			        	</li>
			      	</ul>
			    	</div><!-- /.navbar-collapse -->
			  	</div><!-- /.container-fluid -->
			</nav>

			<div class="content-fluid">
				<div class="row">
					<div class="col-xs-1 col-sm-5 col-md-5">
					</div>

					<div class="col-xs-10 col-sm-2 col-md-2 main-logo">
					   <!--<img src="assets/img/main_logo_2.png" height="120px">-->
					</div>

					<div class="col-xs-1 col-sm-5 col-md-5">
					</div>
				</div>
			</div>
		</div>
		<footer class="footer">
	      	<div class="container-fluid">
	        	<div class="col-xs-12 col-sm-3 col-md-3">
	        		<p>About</p>
	        	</div>
	        	<div class="col-xs-12 col-sm-3 col-md-3">
	        		<p>FAQ</p>
	        	</div>
	        	<div class="col-xs-12 col-sm-3 col-md-3">
	        		<p><a href="/content/Impressum/" target="_blank">Impressum</a></p>
	        	</div>
	        	<div class="col-xs-12 col-sm-3 col-md-3">
	        		<p>Copyright</p>
	        		<span>&copy; Copyright 2015 Green-League. All rights reserved. 
						Green-League isn't endorsed by Riot Games and doesn't reflect the views or opinions of Riot Games 
						or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games 
						are trademarks or registered trademarks of Riot Games, Inc. League of Legends &copy; Riot Games</span>
	        	</div>
	      	</div>
	    </footer>
	</body>
</html>

<link rel="stylesheet" href="assets/css/bootstrap.min.css">		
<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="assets/css/main.css" >
<script src="assets/js/jquery-2.1.4.min.js"></script>	
<script src="assets/js/bootstrap.min.js" ></script>	
<script src="assets/js/main.js"></script>