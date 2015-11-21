<?php 
	// Traitement du POST
	if(isset($_POST) && $_POST["pass_conf"] == $_POST["password"]){
		$pseudo = $_POST["pseudo"];
		$email = $_POST["email"];
		$password = md5(PRE_SALT.$_POST["password"].SUF_SALT); // Hash le mot de passe saisi
		$pass_conf = $_POST["pass_conf"];
		
		// Recherche l'utilisateur dans la bdd
		$user = array("table"=>"Utilisateur","conditions"=>array("Login="=>$pseudo, "Email="=>$email));
		$user = findFirst($bdd, $user);
		
		// On enregistre l'utilisateur s'il n'est pas déjà existant.
		if(!$user){

			// On inscrit l'utilisateur dans la bdd
			$inscription=array("table"=>"Utilisateur", "Login"=>$pseudo,"MotDePasse"=>$password,"Email"=>$email);
			$res = save($bdd,$inscription);
			
			if(!$res)
				echo "<p>Il y a eu un problème à l'inscription</p>";
			else
				echo "<p>Inscription réussie vous allez être redirigé dans 5 secondes !</p>";
				refreshUrl("/",5); // L'inscription s'est bien déroulée on redirige vers l'accueil
		}else{
			echo "<p>Utilisateur déjà existant !</p>";
			refreshUrl("/",5);
		}
	}else{
		echo "<p>Vous n'avez rien à faire ici !</p>";
		refreshUrl("/",5);
	}

?>

