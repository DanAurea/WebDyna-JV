<?php
	
	if(isset($_POST['pseudo']) && isset($_POST['password'])){ // Vérifie que les données ont bien été définies
		
		if(!empty($_POST['pseudo']) && !empty($_POST['password'])){ // Vérifie que les données ne sont pas vides
			
			$pseudo=$_POST["pseudo"];
			$password=md5(PRE_SALT.$_POST["password"].SUF_SALT); // Hash le mot de passe saisi

			// Cherche les informations saisie dans la bdd
			$user=array("table"=>"vr_grp4_clients","fields" => "Login,Email,Client, Nom, Prenom","conditions"=>array("Login="=>$pseudo,"MotDePasse="=>$password));
			$user=findFirst($bdd,$user);
			
			if($user){
				echo "Vous etes connecté, redirection dans 5 secondes !"; // Utilisateur trouvé
				$_SESSION['user'] = $user;
				refreshUrl("/",5);
			}else{
				echo "<p class=\"fred ferror\">Votre pseudo et votre mot de passe ne correspondent pas ! </p>";
				echo "<p class=\"fred ferror\">Vous allez être redirigé dans 5 secondes !</p>";
				refreshUrl("/",5);
			}

		}

	}
	

?>
