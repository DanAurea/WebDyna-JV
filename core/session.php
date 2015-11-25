<?php
	session_start();
	$_SESSION['panier'] = array();
	// Vérifie que l'utilisateur est connecté
	function isLogged(){
  		return isset($_SESSION['user']->Login);
	}

?>