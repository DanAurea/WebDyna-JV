<!DOCTYPE html >
<html>
	<?php 	
			require_once("core/includes.php");
			
			// Si l'utilisateur se déconnecte alors on supprime la session et on rafraichît la page
			if(isset($_GET['logout']) && $_GET['logout'] == 1){
				session_destroy();
				refreshUrl("/", 0);
			}
	?>
	<head>
		<title>
	 		<?php 
	 			// Define title page in default case and home page
	 		 	if (basename($_SERVER['SCRIPT_NAME']) == "index.php") $title = 'Accueil';
	 			if(isset($title)) echo $title;
	 			else echo "Jeux-Video";
	 		?>
		</title>
		<link rel="stylesheet" type="text/css" href='<?php echo BASE_URL.'/css/style.css'?>' />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.5">
	</head>
	<body>	
		<?php require_once(ROOT."/core/header.php");// Display banner, logo and others informations ?>
		<div id="container">
			
			<?php
				// Display page requested
			 	$filename = basename($_SERVER["SCRIPT_NAME"]);

				if(!file_exists($filename)){
					e404();
				}else{
					require_once(ROOT.'/contents/'.$filename);
				}
			?>
		
		<?php require_once(ROOT.'/core/footer.php');// Informations rapides sur le site ?>
		</div>
		
	</body>
</html>
<?php $bdd = null; // Ferme la connexion à la bdd ?>