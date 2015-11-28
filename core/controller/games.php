<!-- //Récupération des informations sur tous les jeux -->
<?php
	

	$games = array(
			"table"=>"vr_grp4_jeux_test",
			'limit'      => ($perPage*($currentPage-1)).','.$perPage, // limite le nombre de jeux sur la page
			"order" => "ID_JEUX", "sortBy" => "DESC");
	$games = find($bdd, $games);

	
	$total = findFirst($bdd, array(
				"table"=>"vr_grp4_jeux_test",
	          	"fields" => 'COUNT(ID_JEUX) as count' // On compte le nombre de jeux pour la pagination
         	));

	$pages = ceil($total->count / $perPage); // On calcule le total de page
	$where = "pages/games.php"; // On indique à la pagination vers quel script rediriger
	
	
	if(!empty($_POST)){

		$searchFields = array(); // Création d'un tableau qui contiendra les données à rechercher
		foreach ($_POST as $key => $value) {
			if(!empty($value) && $key != "research_done"){
				$searchFields[$key." LIKE "] = "%".$value."%" ; // Construit la requête pour la recherche
			}
		}

		if(!empty($searchFields)){ // Si recherche on affiche tout les jeux correspondant
			$games = array("table"=>"vr_grp4_jeux_test","conditions" => $searchFields);
			$games = find($bdd, $games); // Recherche les jeux correspondants
		}
	}

?>