<?php 
	// Traitement du POST
	if(isset($_POST)){
		if(!empty($_POST["pseudo"]) && !empty($_POST["password"])){
			$pseudo = $_POST["pseudo"];
			$client = substr(md5(PRE_SALT.$pseudo.SUF_SALT), 0, 10); // Génère numéro client
			$email = $_POST["email"];
			$password = md5(PRE_SALT.$_POST["password"].SUF_SALT); // Hash le mot de passe saisi
			$pass_conf = $_POST["pass_conf"];
			
			// Recherche l'utilisateur dans la bdd
			$user = array("table"=>"vr_grp4_clients","conditions"=>array("Login="=>$pseudo, "Email="=>$email));
			$user = findFirst($bdd, $user);
		
			// On enregistre l'utilisateur s'il n'est pas déjà existant.
			if(!$user){

				// On inscrit l'utilisateur dans la bdd
				$inscription=array("table"=>"vr_grp4_clients", "Login"=>$pseudo,"MotDePasse"=>$password,"Email"=>$email, "Client" => $client);
				$res = save($bdd,$inscription);
			
				if(!$res){
					echo "<p>Il y a eu un problème à l'inscription</p>";
					refreshUrl("/pages/register",5);
				}else{
					echo "<p>Inscription réussie vous allez être redirigé dans 5 secondes !</p>";
					refreshUrl("/",5); // L'inscription s'est bien déroulée on redirige vers l'accueil
				}
			}else{
				echo "<p>Utilisateur déjà existant !</p>";
				refreshUrl("/",5);
			}

		}else{
			echo "<p>Champs vide !</p>";
			refreshUrl("/pages/register.php", 1);
		}
		
	}else{
		echo "<p>Vous n'avez rien à faire ici !</p>";
		refreshUrl("/",5);
	}

?>

