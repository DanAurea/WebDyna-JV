<!DOCTYPE html >
<html>
	<?php include("const.php"); ?>
	<?php include(ROOT."/conf/conf.php"); ?>
	<?php //include(ROOT."/core/datas.php"); ?>
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
		include(ROOT."/core/header.php"); ?>
		<div id="container">
			
			<?php
				/** Display page requested*/
			 	$filename = basename($_SERVER["SCRIPT_NAME"]);
				if(!file_exists($filename)){
					include(ROOT.'/contents/404.php');
				}else{
					include(ROOT.'/contents/'.$filename);
				}
			?>

			<?php include(ROOT.'/core/footer.php'); ?>
		</div>
	</body>

</html>
