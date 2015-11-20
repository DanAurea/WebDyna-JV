<?php 
	$pseudo=$_POST["pseudo"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$pass_conf=$_POST["pass_conf"];
	
	$log=array("table"=>"Utilisateur","conditions"=>array("Login="=>$pseudo,"Email="=>$email));
	
	$donnee = find($bdd, $log);
	if(!$donnee){
		$inscription=array("table"=>"Utilisateur", "Login"=>$pseudo,"MotDePasse"=>$password,"Email"=>$email);
		$res = save($bdd,$inscription);
		if(!$res)
			echo "Il y a eu un probleme a l'inscription";
		else
			redirect("/?test=3");
	}

?>

