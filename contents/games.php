<aside class="search left">
</aside>

<section class="games-reviews center outred">
	<div class="border-top red"></div>
	<div class="border-bottom"></div>
	<h1 class="fred">Jeux</h1>
	
	<!-- //Récupération des informations sur tous les jeux -->
	<?php 	$games = array("table"=>"VR_grp4_Jeux_Test");
		$games = find($bdd, $games);
	?>
	
	<!-- Création d'un article par jeu dans la BdD -->
	<?php foreach($games as $game): ?>
	
	<?php
	$link_review = "game_review.php/?id=" .$game->ID;
	
	echo '<article class="reviews">
		<img src="' .BASE_URL. '/img/' .$game->ID. '.png" alt="$game->Nom" />
		<h2 class="fred title-review">
			' .$game->Nom. '
		</h2>
		<p class="type fyellow"> Genre du jeu : ' .$game->Genre. '</p>
		<p class="text-review">
			' .troncate($game->Desc, 300). '
		</p>
		<a href="' .$link_review. '"class="more">Lire la suite</a>
	</article>';
	
	?>
	
	<?php endforeach; ?>
</section>
