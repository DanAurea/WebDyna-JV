<!DOCTYPE html >
<html>
	<?php 	// Inclusion de toutes ce qui est nécéssaire pour gérer le site
			require_once("const.php");
			require_once(ROOT."/conf/conf.php"); 
			require_once(ROOT."/core/datas.php"); 
			require_once(ROOT."/core/url.php");
			require_once(ROOT."/core/fonctions.php");
	?>
	<head>
		<title>
	 		<?php 
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
		<?php 
		require_once(ROOT."/core/header.php"); ?>
		<div id="container">
			
			<?php
				/** Display page requested */
			 	$filename = basename($_SERVER["SCRIPT_NAME"]);

				if(!file_exists($filename)){
					e404();
				}else{
					require_once(ROOT.'/contents/'.$filename);
				}
			?>

			<?php require_once(ROOT.'/core/footer.php'); ?>
		</div>
	</body>

</html>
