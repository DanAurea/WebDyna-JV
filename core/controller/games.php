<!-- //Récupération des informations sur tous les jeux -->
<?php 	
	if(empty($_POST)){ // Si pas de recherche on affiche tout les jeux dans l'ordre de saisie dans la bdd
		$games = array("table"=>"vr_grp4_jeux_test", "order" => "ID_JEUX", "sortBy" => "DESC");
		$games = find($bdd, $games);
	}else{
		$searchFields = array();
		foreach ($_POST as $key => $value) {
			if(!empty($value) && $key != "research_done"){
				$searchFields[$key." LIKE "] = "%".$value."%" ; // Construit la requête pour la recherche
			}
		}
		$games = array("table"=>"vr_grp4_jeux_test","conditions" => $searchFields);
		$games = find($bdd, $games); // Recherche les jeux correspondants
	}
		
		
	$genres = array("distinct"=>"Genre", "fields"=>"Genre", "table"=>"vr_grp4_jeux_test"); // Cherche tout les genres dans la bdd
	$genres = find($bdd, $genres);
	
	$supports = array("distinct"=>"Support", "fields"=>"Support", "table"=>"vr_grp4_jeux_test"); // Cherche tout les supports dans la bdd
	$supports = find($bdd, $supports);
	
	$nbJoueurs = array("distinct"=>"NbJoueurs", "fields"=>"NbJoueurs", "table"=>"vr_grp4_jeux_test"); // Cherche tout les nombres de joueurs dans la bdd
	$nbJoueurs = find($bdd, $nbJoueurs);

?>