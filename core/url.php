<?php
		/* 
			Redirige une page vers la cible passé en paramètre
			@url Url vers laquelle rediriger 
		*/
    	function redirect($url){
        	header("Location: ".BASE_URL.$url);
      }

      /* 
        Redirige une page vers la cible passé en paramètre
        @url Url vers laquelle rediriger
        @time Temps avant le rafraichissement de la page
      */
      function refreshUrl($url, $time){
          header("refresh:".$time.";url= ".BASE_URL.$url);
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