<aside class="search left">
</aside>

<section class="news-page games-reviews center outred">
	<div class="border-top red"></div>
	<div class="border-bottom"></div>
	
	<div id="view">
	
		<?php if(isset($details)): // Vérifie si vue détaillée affichée ?>
				<span> Affichage détaillé | </span>
				<a id="change-view" class="fyellow" href="<?php echo BASE_URL."/pages/news.php"; ?>">Affichage simple</a>
		<?php endif; ?>
		
		<?php if(!isset($details)): ?>
				<a id="change-view" class="fyellow" href="<?php echo BASE_URL."/pages/news.php?details=1"; ?>"> Affichage détaillé | </a>
				<span>Affichage simple</span>
		<?php endif; ?>
	
	</div>

	<h1 class="fred">Nouveautés</h1>
	
	<!-- //Récupération des informations sur tous les jeux -->
	<?php 	
			$news = array("table"=>"VR_grp4_Jeux_Test", 
					"order" => "id", "sortBy" => "DESC", "limit" => "6", 
					"conditions" => "Sortie<"."'".$today."'");
			$news = find($bdd, $news);
	?>

	<?php if(!isset($details)): ?>
		<div class="grid">
		<!-- Grille des prochaines sorties -->
			<ul id="grid-releases">
	<?php endif; ?>

	<!-- Création d'un article par jeu dans la BdD -->
	<?php foreach($news as $new): ?>
	
	<?php if(isset($details)): ?>
		<article class="reviews">
			<img src="<?php echo BASE_URL."/img/".$new->ID.".png"; ?>" alt="<?php echo $new->Nom; ?>" />
			<h2 class="fred title-review">
				<?php echo $new->Nom; ?> :
			</h2>
			<p class="type fyellow"> Genre du jeu : <?php echo $new->Genre; ?></p>
			<p class="text-review">
				<?php echo troncate($new->Desc, 300); ?> 
			</p>
			<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$new->ID; ?>"class="more">Lire la suite</a>
		</article>
	<?php endif; ?>
			
			<!-- //Récupération des informations sur toutes les prochaines sorties -->
			<?php 	$nextReleases = array("table"=>"VR_grp4_Jeux_Test", "order" => "Sortie", 
					"sortBy" => "ASC", "limit" => "6", 
					"conditions" => "Sortie>'".$today."'");
					$nextReleases = find($bdd, $nextReleases);
			?>
			
			<?php if(!isset($details)): ?>
				<li>
					<a class ="addBasket large" href="<?php echo BASE_URL."/pages/basket.php?id=".$new->ID; ?>">+</a>
					<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$new->ID ?>">
						<img src="<?php echo BASE_URL."/img/".$new->ID.".png" ?>" alt="<?php echo $new->Nom; ?>">
						<p><?php echo $new->Nom; ?></p>
					</a>
				</li>
			<?php endif; ?>

	<?php endforeach; ?>

	<?php if(!isset($details)): ?>
		</ul>
		</div>
	<?php endif; ?>

</section>