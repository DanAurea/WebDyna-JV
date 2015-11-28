<?php 
	$genres = array("distinct"=>"Genre", "fields"=>"Genre", "table"=>"vr_grp4_jeux_test"); // Cherche tout les genres dans la bdd
	$genres = find($bdd, $genres);
	
	$supports = array("distinct"=>"Support", "fields"=>"Support", "table"=>"vr_grp4_jeux_test"); // Cherche tout les supports dans la bdd
	$supports = find($bdd, $supports);
	
	$nbJoueurs = array("distinct"=>"NbJoueurs", "fields"=>"NbJoueurs", "table"=>"vr_grp4_jeux_test"); // Cherche tout les nombres de joueurs dans la bdd
	$nbJoueurs = find($bdd, $nbJoueurs);
?>

<aside class="search left outorange">
	<div class="border-top orange"></div>
	<div class="border-bottom"></div>

	<form action="<?php echo BASE_URL."/pages/games.php"; ?>" method="post">
		<h2 class="forange">Recherche </h2>

		<ol>
			<li> 
				<label for="Nom">Nom :</label> 
				<input type="text" name="Nom"/>
			</li>

			<li>
				<label for="Genre">Genre : </label>
				<select name="Genre">
					<option value=""></option>

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
					<option value=""></option>

					<?php foreach($supports as $support): ?>
						<option value="<?php echo $support->Support; ?>"><?php echo $support->Support; ?></option>
					<?php endforeach; ?>

				</select>
			</li>

			<li>
				<label for="NbJoueurs">Multijoueur :</label>
				<select name="NbJoueurs">
					<option value=""></option>
					
					<?php foreach($nbJoueurs as $nb): ?>
						<option value="<?php echo $nb->NbJoueurs; ?>"><?php echo $nb->NbJoueurs; ?></option>
					<?php endforeach; ?>

				</select>
			</li>

		</ol>

		<input type="submit" value="Rechercher" name="research_done">
	</form>

</aside>