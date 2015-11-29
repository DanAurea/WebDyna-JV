<?php include(ROOT."/core/search.php"); ?>

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

	<h1 class="fred">Prochaines sorties</h1>
	
	<?php 	
			//Récupération des informations sur toutes les prochaines sorties en limitant
			//le nombre de jeux par page.
			$nextReleases = array("table"=>"vr_grp4_jeux_test", "order" => "Sortie",
			'limit'      => ($perPage*($currentPage-1)).','.$perPage, 
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
			
			<!-- Description de l'article -->
			<div class="brief">
				<h2 class="fred title-review">
					<?php echo $release->Nom; ?> 
				</h2>
				<p class="type fyellow"> Genre du jeu : <?php echo $release->Genre; ?></p>
				<p class="text-review">
					<?php echo troncate($release->Desc, 300); ?> 
				</p>
				<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$release->ID_JEUX; ?>" class="more">Lire la suite</a>
			</div>

		</article>
	<?php endif; ?>
			
			
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

	<?php 

		$total = findFirst($bdd, array(
				"table"=>"vr_grp4_jeux_test",
	          	"fields" => 'COUNT(ID_JEUX) as count',
	          	 "order" => "Sortie", 
				"sortBy" => "ASC", "limit" => "6", 
				"conditions" => "Sortie>'".$today."'" // On compte le nombre de jeux pour la pagination
         	));

		$pages = ceil($total->count / $perPage); // On calcule le total de page
		$where = "pages/next-releases.php"; // On indique à la pagination vers quel script rediriger
		
		include(ROOT."/core/pagination.php");
	 ?>

</section>