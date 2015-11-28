<?php 
		
	$scriptPage = basename($_SERVER['SCRIPT_NAME']); // Définis le nom du script php actuellement appelé
	
	// Définis les constantes pour le chemin absolu
	if ($scriptPage != "index.php"){	
		define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
		define('ROOT',dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
	}else{
		define('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
		define('ROOT',dirname($_SERVER['SCRIPT_FILENAME']));
		$title = 'Accueil';
	}

	$today = date('Y-m-d'); // Date actuelle au format aaaa-mm-jj
	
	if(!isset($details) && $scriptPage != "index.php"){
		$perPage = 12; // Nombre de jeux par page en mode grille
	}else{
		$perPage = 6; // Nombre de jeux par page en mode détaillé
	}

	define('PRE_SALT',"MvDmBd"); // Sel préfixé pour le md5
	define('SUF_SALT',"JnBnCs"); // Sel suffixé pour le md5
?>
