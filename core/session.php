<?php
	session_start();

	if(!isset($_SESSION['panier'])){ // Crée le panier si pas existant
		$_SESSION['panier'] = array();
	}
	
	// Vérifie que l'utilisateur est connecté
	function isLogged(){
  		return isset($_SESSION['user']->Login);
	}

?>