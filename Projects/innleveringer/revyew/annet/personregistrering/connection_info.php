<?php
		//Tilkoblingsinformasjon
			$tjener = "localhost";
			$brukernavn = "root";
			$passord = "";
			$database = "personer";

		//Opprette kobling
			$kobling = new mysqli($tjener, $brukernavn, $passord, $database);
			
			//Sjekk om kobling virker
			if($kobling->connect_error) {
				die("Noe gikk galt: " . $kobling->connect_error);
			}
			
			//Angi UTF-8 som tegnsett
			$kobling->set_charset("utf8");
			
?>