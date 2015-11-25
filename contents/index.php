<aside class="news left outorange">
	<!-- Bordure haute du conteneur -->
	<div class="border-top orange"></div>
	<div class="border-bottom"></div>
	<h1 class="forange">Nouveautés</h1>
	
	<!-- Grille des nouveautés -->
	<div class="grid">
		<ul id="grid-news">
			
			<!-- //Récupération des informations sur toutes les nouveautés -->
			<?php 	$news = array("table"=>"VR_grp4_Jeux_Test", 
					"order" => "id", "sortBy" => "DESC", "limit" => "6", 
					"conditions" => "Sortie<"."'".$today."'");
					$news = find($bdd, $news);
			?>

			<!-- Création d'un item par nouveauté -->
			<?php foreach($news as $new): ?>
				<li>
					<a class ="addBasket" href="<?php echo BASE_URL."/pages/basket.php?id=".$new->ID; ?>">+</a>
					<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$new->ID ?>">
						<img src="<?php echo BASE_URL."/img/".$new->ID.".png"; ?>" alt="<?php echo $new->Nom; ?>">
						<span><?php echo $new->Nom; ?></span>
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

	<!-- //Récupération des informations sur tous les jeux -->
	<?php 	$games = array("table"=>"VR_grp4_Jeux_Test", 
							"order" => "id", "sortBy" => "DESC");
			$games = find($bdd, $games);
	?>
	
	<!-- Création d'un article par jeu dans la BdD -->
	<?php foreach($games as $game): ?>
		<article class="reviews">
			
			<img src="<?php echo BASE_URL."/img/".$game->ID.".png";?>" alt="<?php echo $game->Nom; ?>" /> <!-- Affiche l'image correspondante -->
			<h2 class="fred title-review"> <?php echo $game->Nom; ?> :</h2> <!-- Affiche le nom correspondant -->
			<p class="type fyellow">Genre du jeu : <?php echo $game->Genre; ?></p> <!-- Affiche le genre correspondant -->
			<p class="text-review"><?php echo troncate($game->Desc, 200); ?></p> <!-- Affiche un court résumé -->
			<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$game->ID; ?>" class="more">Lire la suite</a>
		
		</article>
	<?php endforeach; ?>

</section>

<aside class="next-releases right outgreen">
	<!-- Bordure haute du conteneur -->
	<div class="border-top green"></div>
	<div class="border-bottom"></div>
	<h1 class="fgreen">Prochaines sorties</h1>
	
	<!-- Grille des prochaines sorties -->
	<div class="grid">
		<ul id="grid-releases">
			
			<!-- //Récupération des informations sur toutes les prochaines sorties -->
			<?php 	$nextReleases = array("table"=>"VR_grp4_Jeux_Test", "order" => "Sortie", 
					"sortBy" => "ASC", "limit" => "6", 
					"conditions" => "Sortie>'".$today."'");
					$nextReleases = find($bdd, $nextReleases);
			?>
			
			<?php foreach ($nextReleases as $release): ?>
				<li>
					<a class ="addBasket" href="<?php echo BASE_URL."/pages/basket.php?id=".$release->ID; ?>">+</a>
					<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$release->ID ?>">
						<img src="<?php echo BASE_URL."/img/".$release->ID.".png" ?>" alt="<?php echo $release->Nom; ?>">
						<span><?php echo $release->Nom; ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</aside>