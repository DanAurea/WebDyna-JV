<?php
	session_start();
	
	// Vérifie que l'utilisateur est connecté
	function isLogged(){
  		return isset($_SESSION['user']->Login);
	}

?>