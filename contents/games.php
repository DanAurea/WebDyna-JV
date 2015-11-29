<?php include(ROOT."/core/controller/games.php"); ?>
<?php include(ROOT."/core/search.php"); ?>

<section class="games-reviews center outred">
	<div class="border-top red"></div>
	<div class="border-bottom"></div>
	
	<div id="view">
	
		<?php if(isset($details)): // Vérifie si vue détaillée affichée ?>
				<span> Affichage détaillé | </span>
				<a id="change-view" class="fyellow" href="<?php echo BASE_URL."/pages/games.php"; ?>">Affichage simple</a>
		<?php endif; ?>
		
		<?php if(!isset($details)): ?>
				<a id="change-view" class="fyellow" href="<?php echo BASE_URL."/pages/games.php?details=1"; ?>"> Affichage détaillé | </a>
				<span>Affichage simple</span>
		<?php endif; ?>
	
	</div>

	<h1 class="fred">Jeux</h1>

	<?php if(!isset($details)): ?>
		<div class="grid">
		<!-- Grille des prochaines sorties -->
			<ul id="grid-releases">
	<?php endif; ?>

	<?php 
		// Création d'un article par jeu dans la BdD
		foreach($games as $game): 
	?>
	
	<?php if(isset($details)): ?>
		<article class="reviews">
			<img src="<?php echo BASE_URL."/img/".$game->ID_JEUX.".png"; ?>" alt="<?php echo $game->Nom; ?>" />
			
			<!-- Description du jeu -->
			<div class="brief">
				<h2 class="fred title-review">
				<?php echo $game->Nom; ?>
				</h2>
				<p class="type fyellow"> Genre du jeu : <?php echo $game->Genre; ?></p>
				<p class="text-review">
					<?php echo troncate($game->Desc, 300); ?> 
				</p>
				<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$game->ID_JEUX; ?>" class="more">Lire la suite</a>
			</div>
			
		</article>
	<?php endif; ?>
			
			<?php if(!isset($details)): ?>
				<li>
					<a class ="addBasket large" href="<?php echo BASE_URL."/pages/basket.php?id=".$game->ID_JEUX; ?>">+</a>
					<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$game->ID_JEUX ?>">
						<img src="<?php echo BASE_URL."/img/".$game->ID_JEUX.".png" ?>" alt="<?php echo $game->Nom; ?>">
						<p><?php echo $game->Nom; ?></p>
					</a>
				</li>
			<?php endif; ?>

	<?php endforeach; ?>

	<?php if(!isset($details)): ?>
		</ul>
		</div>
	<?php endif; ?>

	<?php include(ROOT."/core/pagination.php"); ?>

</section>