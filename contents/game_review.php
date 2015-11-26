<section class="container-review center outred">
	<div class="border-top red"></div>
	<div class="border-bottom"></div>
	<h1 class="fred">Jeux</h1>

	<!-- //Récupération des informations sur tous les jeux -->
	<?php 	$req = array("table"=>"VR_grp4_Jeux_Test", "conditions" => "ID_JEUX =".$_GET['id']);
			$game = findFirst($bdd, $req);

			if(!$game) redirect("/pages/games.php"); // Redirige si aucun résultat
	?>

	<!-- Création d'un article par jeu dans la BdD -->
	<article class="container-review">
		<img src="<?php echo BASE_URL."/img/".$game->ID_JEUX.".png" ?>" alt="<?php echo $game->Nom ?>" />

		<section class="brief">
			
			<div id="short-infos">
				<h2 class="fred title-review">
					<?php echo $game->Nom; ?>
				</h2>
				
				<!-- Affiche le type du jeu -->
				<ul class="type">
					<?php $Sortie = formatDate($game->Sortie); ?>
					<li class="fyellow">Genre du jeu :  <?php echo $game->Genre; ?></li>
					<li class="fyellow">Date de sortie :  <?php echo $Sortie; ?></li>
					<li class="fyellow">Âge :  <?php echo $game->Ages; ?></li>
					<li class="fyellow">Support : <?php echo $game->Support; ?></li>
					<li class="fyellow">Nombre de joueurs : <?php  echo $game->NbJoueurs?></li>
				</ul>
			</div>

			<a id="reservation" href="<?php echo BASE_URL."/pages/basket.php?id=".$game->ID_JEUX; ?>">Réserver</a>

			<!-- Affiche une description du jeu -->
			<p class="text-review">
				<?php echo $game->Desc; ?>
			</p>

		</section>
	</article>

</section>
