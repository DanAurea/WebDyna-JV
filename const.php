<?php 
	if (basename($_SERVER['SCRIPT_NAME']) != "index.php"){	
		define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
		define('ROOT',dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
	}else{
		define('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
		define('ROOT',dirname($_SERVER['SCRIPT_FILENAME']));
		$title = 'Accueil';
	}

	$today = date('Y-m-d');
?>
