<aside class="news left outorange">
	<!-- Bordure haute du conteneur -->
	<div class="border-top orange"></div>
	<div class="border-bottom"></div>
	<h1 class="forange">Nouveautés</h1>
	
	<!-- Grille des nouveautés -->
	<div class="grid">
		<ul id="grid-news">
			
			<?php 	
					//Récupération des informations sur toutes les nouveautés
					$news = array("table"=>"vr_grp4_jeux_test", 
					"order" => "ID_JEUX", "sortBy" => "DESC", "limit" => "6", 
					"conditions" => "Sortie<"."'".$today."'");
					$news = find($bdd, $news);
			?>

			<?php 
				//	Création d'un item par nouveauté
				foreach($news as $new): 
			?>
				<li>
					<a class ="addBasket" href="<?php echo BASE_URL."/pages/basket.php?id=".$new->ID_JEUX; ?>">+</a>
					<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$new->ID_JEUX ?>">
						<img src="<?php echo BASE_URL."/img/".$new->ID_JEUX.".png"; ?>" alt="<?php echo $new->Nom; ?>">
						<p><?php echo $new->Nom; ?></p>
					</a>
				</li>
			<?php endforeach; ?>
			
		</ul>
	</div>

</aside>

<section class="container-reviews center outred">
	<!-- Bordure haute du conteneur -->
	<div class="border-top red"></div>
	<div class="border-bottom"></div>
	<h1 class="fred">Tests</h1>

	<?php 	
	
			//Récupération des informations sur tous les jeux
			$games = array("table"=>"vr_grp4_jeux_test", 
							'limit'      => ($perPage*($currentPage-1)).','.$perPage, // limite le nombre de jeux sur la page
							"order" => "ID_JEUX", "sortBy" => "DESC");

			$games = find($bdd, $games); // On cherche tout les jeux
			
			$total = findFirst($bdd, array(
				"table"=>"vr_grp4_jeux_test",
	          	"fields" => 'COUNT(ID_JEUX) as count', // On compte le nombre de jeux pour la pagination
         	));

			$pages = ceil($total->count / $perPage); // On calcule le total de page
	?>

	<!-- Création d'un article par jeu dans la BdD -->
	<?php foreach($games as $game): ?>
		<article class="reviews">
			
			<img src="<?php echo BASE_URL."/img/".$game->ID_JEUX.".png";?>" alt="<?php echo $game->Nom; ?>" /> <!-- Affiche l'image correspondante -->
			
			<div class="brief">
				<h2 class="fred title-review"> <?php echo $game->Nom; ?> </h2> <!-- Affiche le nom correspondant -->
				<p class="type fyellow">Genre du jeu : <?php echo $game->Genre; ?></p> <!-- Affiche le genre correspondant -->
				<p class="text-review"><?php echo troncate($game->Desc, 180); ?></p> <!-- Affiche un court résumé -->
				<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$game->ID_JEUX; ?>" class="more">Lire la suite</a>
			</div>
		
		</article>
	<?php endforeach; ?>

	<?php 
		$where = "index.php"; // On définis le script à appeler
		include(ROOT."/core/pagination.php"); 
	?>

</section>

<aside class="next-releases right outgreen">
	<!-- Bordure haute du conteneur -->
	<div class="border-top green"></div>
	<div class="border-bottom"></div>
	<h1 class="fgreen">Prochaines sorties</h1>
	
	<!-- Grille des prochaines sorties -->
	<div class="grid">
		<ul id="grid-releases">
			
			<?php 	
					//Récupération des informations sur toutes les prochaines sorties
					$nextReleases = array("table"=>"vr_grp4_jeux_test", "order" => "Sortie", 
					"sortBy" => "ASC", "limit" => "6", 
					"conditions" => "Sortie>'".$today."'");
					$nextReleases = find($bdd, $nextReleases);
			?>
			
			<?php foreach ($nextReleases as $release): ?>
				<li>

					<!-- Article unique --> 
					<a class ="addBasket" href="<?php echo BASE_URL."/pages/basket.php?id=".$release->ID_JEUX; ?>">+</a>
					<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$release->ID_JEUX ?>">
						<img src="<?php echo BASE_URL."/img/".$release->ID_JEUX.".png" ?>" alt="<?php echo $release->Nom; ?>">
						<p><?php echo $release->Nom; ?></p>
					</a>

				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</aside>