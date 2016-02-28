<?php

if(isset($_POST)){
	if($_POST["e"] == "ServerCheck"){
		require_once("app/controller/slat/slat.php");
		$slat = new slat();
		print $slat->returnMagic($_POST['Magic']);
	}
}else{
	return "Post-Variable nicht gesetzt";
}