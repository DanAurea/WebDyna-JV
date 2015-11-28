<?php
	
	// Régle de validation
	$validate = array(
    'pseudo' => array('rule' => 'pseudo','message' => 'Votre pseudo doit faire 4 à 16 caractères alphanumériques !'),
    'password' => array('rule' => 'password','message' => 'Votre mot de passe doit faire 4 à 32 caractères alphanumériques !')
    );

	// Traitement du POST
	if(isset($_POST)){
		if(!is_array(validates($validate, $_POST))){
			$pseudo = $_POST["pseudo"];
			$client = substr(md5(PRE_SALT.$pseudo.SUF_SALT), 0, 10); // Génère numéro client
			$email = $_POST["email"];
			$password = md5(PRE_SALT.$_POST["password"].SUF_SALT); // Hash le mot de passe saisi
			$pass_conf = $_POST["pass_conf"];
			
			// Recherche l'utilisateur dans la bdd
			$user = array("table"=>"vr_grp4_clients","conditions"=>array("Login="=>$pseudo, "Email="=>$email), "operator" => "OR");
			$user = findFirst($bdd, $user);
		
			// On enregistre l'utilisateur s'il n'est pas déjà existant.
			if(!$user){
				
				// On inscrit l'utilisateur dans la bdd
				$inscription=array("table"=>"vr_grp4_clients", "Login"=>$pseudo,"MotDePasse"=>$password,"Email"=>$email, "Client" => $client);
				$res = save($bdd,$inscription);
			
				if(!$res){
					echo "<p class=\"fred ferror\">Il y a eu un problème à l'inscription</p>";
					refreshUrl("/pages/register",5);
				}else{
					echo "<p class=\"fred ferror\">Inscription réussie vous allez être redirigé dans 5 secondes !</p>";
					refreshUrl("/",5); // L'inscription s'est bien déroulée on redirige vers l'accueil
				}

			}else{
				echo "<p class=\"fred ferror\">Utilisateur déjà existant !</p>";
				refreshUrl("/",5);
			}

		}else{

			foreach (validates($validate, $_POST) as $value) { // Affiche les messages d'erreur correspondants
				echo "<p class=\"fred ferror\">".$value."</p>";
			}
			refreshUrl("/pages/register.php", 5);
		}
		
	}else{
		echo "<p class=\"fred ferror\">Vous n'avez rien à faire ici !</p>";
		refreshUrl("/",5);
	}

?>

