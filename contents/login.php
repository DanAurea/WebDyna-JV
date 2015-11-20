<?php
	$pseudo=$_POST["pseudo"];
	$password=$_POST["password"];
	$user=array("table"=>"Utilisateur","conditions"=>array("Login="=>$pseudo,"MotDePasse="=>$password));
	var_dump(findFirst($bdd,$user));
?>
