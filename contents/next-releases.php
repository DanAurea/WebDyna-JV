<aside class="search left">
</aside>

<section class="news-page games-reviews center outred">
	<div class="border-top red"></div>
	<div class="border-bottom"></div>
	
	<div id="view">
	
		<?php if(isset($details)): // Vérifie si vue détaillée affichée ?>
				<span> Affichage détaillé | </span>
				<a id="change-view" class="fyellow" href="<?php echo BASE_URL."/pages/next-releases.php"; ?>">Affichage simple</a>
		<?php endif; ?>
		
		<?php if(!isset($details)): ?>
				<a id="change-view" class="fyellow" href="<?php echo BASE_URL."/pages/next-releases.php?details=1"; ?>"> Affichage détaillé | </a>
				<span>Affichage simple</span>
		<?php endif; ?>
	
	</div>

	<h1 class="fred">Nouveautés</h1>
	
	<!-- //Récupération des informations sur toutes les prochaines sorties -->
	<?php 	$nextReleases = array("table"=>"vr_grp4_jeux_test", "order" => "Sortie", 
			"sortBy" => "ASC", "limit" => "6", 
			"conditions" => "Sortie>'".$today."'");
			$nextReleases = find($bdd, $nextReleases);
	?>

	<?php if(!isset($details)): ?>
		<div class="grid">
		<!-- Grille des prochaines sorties -->
			<ul id="grid-releases">
	<?php endif; ?>

	<!-- Création d'un article par jeu dans la BdD -->
	<?php foreach($nextReleases as $release): ?>
	
	<?php if(isset($details)): ?>
		<article class="reviews">
			<img src="<?php echo BASE_URL."/img/".$release->ID_JEUX.".png"; ?>" alt="<?php echo $release->Nom; ?>" />
			<h2 class="fred title-review">
				<?php echo $release->Nom; ?> :
			</h2>
			<p class="type fyellow"> Genre du jeu : <?php echo $release->Genre; ?></p>
			<p class="text-review">
				<?php echo troncate($release->Desc, 300); ?> 
			</p>
			<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$release->ID_JEUX; ?>"class="more">Lire la suite</a>
		</article>
	<?php endif; ?>
			
			<!-- //Récupération des informations sur toutes les prochaines sorties -->
			<?php 	$nextReleases = array("table"=>"vr_grp4_jeux_test", "order" => "Sortie", 
					"sortBy" => "ASC", "limit" => "6", 
					"conditions" => "Sortie>'".$today."'");
					$nextReleases = find($bdd, $nextReleases);
			?>
			
			<?php if(!isset($details)): ?>
				<li>
					<a class ="addBasket large" href="<?php echo BASE_URL."/pages/basket.php?id=".$release->ID_JEUX; ?>">+</a>
					<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$release->ID_JEUX ?>">
						<img src="<?php echo BASE_URL."/img/".$release->ID_JEUX.".png" ?>" alt="<?php echo $release->Nom; ?>">
						<p><?php echo $release->Nom; ?></p>
					</a>
				</li>
			<?php endif; ?>

	<?php endforeach; ?>

	<?php if(!isset($details)): ?>
		</ul>
		</div>
	<?php endif; ?>

</section>