<section class="login left outred">
	<div class="border-top red"></div>
	<h1 class ="fred">Profil</h1>
	<?php if(isLogged()):/* Afiche seulement si il est connecté*/ ?> 
	<form method="Post" action="profil_modif.php">
	<ol>
		<li>
			<label for="pseudo">Pseudo : </label>
			<input type="text" name="pseudo" placeholder="<?php echo $SESSION['user']->Login; ?>"/>
		</li>
		<li>
			<label for="password">Mot de passe : </label>
			<input type="password" name="password" placeholder="<?php echo "****"; ?>"/>
		</li>
		<li>
			<label for="prenom">Prenom : </label>
			<input type="text" name="prenom" placeholder="<?php echo $SESSION['user']->Prenom; ?>"/>
		</li>
		<li>
			<label for="nom">Nom : </label>
			<input type="text" name="nom" placeholder="<?php echo $SESSION['user']->Nom; ?>"/>
		</li>
		<li>
			<label for"email">Adresse mail : </label>
			<input type="text" name="email" placeholder="<?php echo $SESSION['user']->Email; ?>"/>
		</li>
	</ol>
	<input type="submit" value="Modifié">
	</form>
	<?php endif;
	if(!isLogged()){ 
		echo "<p>Vous etes perdu ? Vous allez etre redirigé.<br/>
		Si vous n'etes pas redirigé, cliquez <a href="ROOT./">ici</a></p>";
		refreshUrl("/",5);
	}
	?>
