<!DOCTYPE html >
<html> 	
	<?php require("/conf/conf.php"); ?>
	<?php require("/core/datas.php"); ?>
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
	</head>
	 
	<body>
		<?php include('core/header.php'); ?>
		<div id="container">
			<?php
				/** Display page requested*/
			 	$filename = str_replace('/','',trim(preg_replace('/WD\/(?:pages\/)?(.*).php/','${1}.php',$_SERVER['SCRIPT_NAME'])));
			 	$file  = str_replace('\\','/',dirname(__FILE__)."/".'contents/'.$filename);

				if(!file_exists($file)){
					include('/contents/404.php');
				}else{
					include('/contents/'.$filename);
				}
			?>

			<?php include('/core/footer.php'); ?>
		</div>
	</body>

</html>
