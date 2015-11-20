<?php
	$pseudo=$_POST["pseudo"];
	$password=$_POST["password"];
	$log=array("table"=>"Utilisateur","conditions"=>array("Login="=>$pseudo,"MotDePasse="=>$password));
	$user=findFirst($bdd,$log);
	
	if($user)
		echo "Vous etes connecté";
	else
		echo " Vous pseudo ou votre mot de passe sont incorrect";
?>
