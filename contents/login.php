<?php
	$pseudo=$_POST["pseudo"];
	$password=md5(PRE_SALT.$_POST["password"].SUF_SALT); // Hash le mot de passe saisi

	// Cherche les informations saisie dans la bdd
	$user=array("table"=>"Utilisateur","fields" => "Login,Email","conditions"=>array("Login="=>$pseudo,"MotDePasse="=>$password));
	$user=findFirst($bdd,$user);
	
	if($user){
		echo "Vous etes connecté, redirection dans 5 secondes !"; // Utilisateur trouvé
		$_SESSION['user'] = $user;
		refreshUrl("/",5);
	}else{
		echo "<p>Votre pseudo et votre mot de passe ne correspondent pas ! </p>";
		echo "<p>Vous allez être redirigé dans 5 secondes !</p>";
		refreshUrl("/",5);
	}
?>
