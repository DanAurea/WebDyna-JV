<?php 
	// Inclusion des fichiers nécéssaires pour récupérer le Nom de la page
	require_once("../const.php");
	require_once(ROOT."/conf/conf.php");
	require_once(ROOT."/core/datas.php");
	
	// On vérifie bien que le paramètre est passé
	if(isset($_GET['id'])){
		// On cherche dans la BDD le premier résultat correspondant
		$req = array("table"=>"vr_grp4_jeux_test", "conditions" => "ID_JEUX =".$_GET['id'], "fields" => "Nom");
		$game = findFirst($bdd, $req);
	}

	if($game)	$title= $game->Nom; // On change le nom de l'onglet si le jeu a été trouvé
	else 		$title = "Jeu"; 

	include('../index.php'); // On charge le modèle de page contenant les constantes et le code HTML nécéssaires au bon fonctionnement
?>
