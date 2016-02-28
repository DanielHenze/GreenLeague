<?php

spl_autoload_register(function($_class){
	if(!@include("app/controller/slat/".$_class.".php")){
		if(!@include("app/model/".$_class.".php")){
			if(!@include("app/viewer/".$_class.".php")){
				if(!@include("app/controller/".$_class.".php")){
					if(!@include("app/database/".$_class.".php")){
						# Print nur zu Debug-Zwecken anschalten
						# print "Die Klasse: <b>".$_class."</b> wurde nicht gefunden.";
					} # Class in Database not found
				} # Class in Controller not found
			} # Class in Viewer not found
		} # Class in Model not found
	} # Class in Controller/Slat not found
});