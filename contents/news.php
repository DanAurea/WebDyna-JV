<?php include(ROOT."/core/controller/games.php"); ?>
<aside class="search left outorange">
	<div class="border-top orange"></div>
	<div class="border-bottom"></div>

	<form action="<?php echo BASE_URL."/pages/games.php"; ?>" method="post">
		<h2 class="forange">Recherche :</h2>

		<ol>
			<li> 
				<label for="Nom">Nom :</label> 
				<input type="text" name="Nom"/>
			</li>

			<li>
				<label for="Genre">Genre : </label>
				<select name="Genre">
					<?php foreach($genres as $genre): ?>
						<option value="<?php echo $genre->Genre; ?>"><?php echo $genre->Genre; ?></option>
					<?php endforeach; ?>
				</select>
			</li>

			<li>
				<label>Age:</label>
				<input type="text" name="Ages">
			</li>

			<li>
				<label for="Support">Support : </label>
				<select name="Support">
					<?php foreach($supports as $support): ?>
						<option value="<?php echo $support->Support; ?>"><?php echo $support->Support; ?></option>
					<?php endforeach; ?>
				</select>
			</li>

			<li>
				<label for="NbJoueurs">Multijoueur :</label>
				<select name="NbJoueurs">
					<?php foreach($nbJoueurs as $nb): ?>
						<option value="<?php echo $nb->NbJoueurs; ?>"><?php echo $nb->NbJoueurs; ?></option>
					<?php endforeach; ?>
				</select>
			</li>

		</ol>

		<input type="submit" value="Rechercher" name="research_done">
	</form>

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
			$news = array("table"=>"vr_grp4_jeux_test", 
					"order" => "ID_JEUX", "sortBy" => "DESC", "limit" => "6", 
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
			<img src="<?php echo BASE_URL."/img/".$new->ID_JEUX.".png"; ?>" alt="<?php echo $new->Nom; ?>" />
			<h2 class="fred title-review">
				<?php echo $new->Nom; ?> :
			</h2>
			<p class="type fyellow"> Genre du jeu : <?php echo $new->Genre; ?></p>
			<p class="text-review">
				<?php echo troncate($new->Desc, 300); ?> 
			</p>
			<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$new->ID_JEUX; ?>"class="more">Lire la suite</a>
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
					<a class ="addBasket large" href="<?php echo BASE_URL."/pages/basket.php?id=".$new->ID_JEUX; ?>">+</a>
					<a href="<?php echo BASE_URL."/pages/game_review.php?id=".$new->ID_JEUX ?>">
						<img src="<?php echo BASE_URL."/img/".$new->ID_JEUX.".png" ?>" alt="<?php echo $new->Nom; ?>">
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