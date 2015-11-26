<?php  
	
	if(isset($_GET['details']) && $_GET['details'] == 1){ // Active la vue détaillée si demandée
		$details = true;
	}

	$title="Prochaines sorties"; include('../index.php');
?>