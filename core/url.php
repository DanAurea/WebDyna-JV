<?php
		/* 
			Redirige une page vers la cible passé en paramètre
			@url Url vers laquelle rediriger 
		*/
    	function redirect($url){
        	header("Location: ".BASE_URL.$url);
      	}

      	/*
      		Redirige vers une page 404 en cas d'erreur
      	*/
      	function e404(){
      		redirect("/contents/404.php");
      		header("HTTP/1.0 404 Not Found");
      		exit();
      	}
?>