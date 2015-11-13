<?php 
	
	/** Define root for absolute path */
	if (basename($_SERVER['SCRIPT_NAME']) != "index.php") define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
	else{
		define('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
		$title = 'Accueil';
	}

	/** Define settings for connection to database */
	$config = array(
		'host'     => 'localhost',
		'database' => 'test',
		'login'    => 'root',
		'password' => ''
		);	
?>