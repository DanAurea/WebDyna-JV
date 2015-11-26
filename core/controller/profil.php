<?php

	if(isset($_POST) && !empty($_POST) && isLogged()){ // Vérifie l'existence, le contenu du POST et l'état de l'utilisateur
		
		$req = array(); // Début requête
		
		if(isset($_POST["MotDePasse"])){
			$_POST["MotDePasse"] = md5(PRE_SALT.$_POST["MotDePasse"].SUF_SALT);
		}

		foreach($_POST as $k => $v){
			if(!empty($v)){
				$req[$k] = "$v"; // Construction de la requête
			}
		}

		$req["table"] = "vr_grp4_clients"; // Table dans la quelle sauvegarder
		$req["Client"] = $_SESSION["user"]->Client; // Définis l'utilisateur
		
		$res =save($bdd, $req, "Client");

		if($res){ // Si l'enregistrement s'est correctement déroulé on met à jour la Session
			foreach($_POST as $k => $v){
				if(!empty($v)){
					 $_SESSION["user"]->$k = $v;
				}
			}
		}

	} 
?>