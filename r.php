<?php

if(isset($_POST)){
	if($_POST["e"] == "ServerCheck"){
		require_once("app/controller/slat/slat.php");
		$slat = new slat($_POST['Magic']);
		print $slat->init();
	}
}else{
	return "Post-Variable nicht gesetzt";
}