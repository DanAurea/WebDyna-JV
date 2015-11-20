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
	
	<article class="reviews">
		<img src='<?php echo BASE_URL.'/img/pokemon_emeraude.png'?>' alt="Pokémon Emeraude" />
		<h2 class="fred title-review">
			<?php echo $game->Nom; ?>	
		</h2>
		<p class="type fyellow"><?php echo "Genre du jeu : " .$game->Genre; ?></p>
		<p class="text-review">
			<?php echo troncate($game->Desc, 300); ?>
		</p>
		<a href="#" class="more">Lire la suite</a>
	</article>
	
	<?php endforeach; ?>
</section>
