<section class="container-review center outred">
	<div class="border-top red"></div>
	<div class="border-bottom"></div>
	<h1 class="fred">Jeux</h1>

	<!-- //Récupération des informations sur tous les jeux -->
	<?php 	$req = array("table"=>"vr_grp4_jeux_test", "conditions" => "ID_JEUX =".$_GET['id']);
			$game = findFirst($bdd, $req);

			if(!$game) redirect("/pages/games.php"); // Redirige si aucun résultat
	?>

	<!-- Création d'un article par jeu dans la BdD -->
	<article class="container-game-review">
		<img src="<?php echo BASE_URL."/img/".$game->ID_JEUX.".png" ?>" alt="<?php echo $game->Nom ?>" />

		<section class="brief">
			
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
			

			<!-- Affiche une description du jeu -->
			<p class="text-review">
				<?php echo $game->Desc; ?>
			</p>
			<div id="reservation-block">
				
				<?php 
					$today = formatDate($today);
					$day   = substr($today, 0, 2); // Récupère le jour actuel
					$month   = substr($today, 4, 4); // Récupère le mois actuel
					$year   = substr($today, 9, 5); // Récupère l'année actuelle
				?>

				<form method="post" action="<?php echo BASE_URL."/pages/basket.php?id=".$game->ID_JEUX ?>">
					
					<div id="hours">
						<label for = "Horaire">Horaire : </label> 
						<select name="Heure">
							<?php for($i = 8; $i <= 17; $i++): ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php endfor; ?>
						</select>
						
						<select name="Minute">
							<?php for($i = 0; $i <= 59; $i++): ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php endfor; ?>
						</select>
					</div>

					
						<label for = "Date">Date : </label> 
						<select name="Jour">
							<?php for($i = 1; $i <= 31; $i++): ?>

								<?php if($i == $day): // Sélectionne le jour actuel ?>
									<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
								<?php endif; ?>
								<?php if($i != $day): // Remplis le select ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php endif; ?>

							<?php endfor; ?>
						</select>
					
					<select name="Mois">
						<?php for($i = 1; $i <= 12; $i++): ?>

							<?php if($i == $month): // Sélectionne le mois actuel ?>
								<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
							<?php endif; ?>
							<?php if($i != $month): // Remplis le select ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php endif; ?>

						<?php endfor; ?>
					</select>

					<select name="Annee">
						<?php for($i = $year; $i <= $year + 1; $i++): ?>

							<?php if($i == $year): // Sélectionne le mois actuel ?>
								<option value="<?php echo $i; ?>" selected><?php echo $i; ?></option>
							<?php endif; ?>
							<?php if($i != $year): // Remplis le select ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php endif; ?>

						<?php endfor; ?>
					</select>
					
					<input id="reservation" type="submit" value="Réserver">
				</form>
			</div>


		</section>
	</article>

</section>
