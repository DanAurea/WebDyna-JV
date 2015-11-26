<?php include(ROOT."/core/controller/profil.php"); ?>

<section class="profil left outred">
	<div class="border-top red"></div>
	<h1 class ="fred">Profil</h1>
	
	<?php if(isLogged()):/* Afiche seulement s'il est connecté*/ ?> 
	
	<form method="Post" action="<?php echo BASE_URL."/pages/profil.php"; ?>">
	<ol>
		<li>
			<label for="Login">Login : </label>
			<input type="text" name="Login" placeholder="<?php echo $_SESSION['user']->Login; ?>"/>
		</li>
		<li>
			<label for="MotDePasse">Mot de passe : </label>
			<input type="password" name="MotDePasse" placeholder="<?php echo "****"; ?>"/>
		</li>
		<li>
			<label for="Prenom">Prenom : </label>
			<input type="text" name="Prenom" placeholder="<?php echo $_SESSION['user']->Prenom; ?>"/>
		</li>
		<li>
			<label for="Nom">Nom : </label>
			<input type="text" name="Nom" placeholder="<?php echo $_SESSION['user']->Nom; ?>"/>
		</li>
		<li>
			<label for"Email">Adresse mail : </label>
			<input type="email" name="Email" placeholder="<?php echo $_SESSION['user']->Email; ?>"/>
		</li>
	</ol>
	<input type="submit" value="Modifier"/>
	</form>

	<?php endif;
		if(!isLogged()){ // Vérifie si l'utilisateur est connecté
			echo "<p class=\"fred ferror container-review\">Vous êtes perdu ? Vous allez être redirigé.<br/>
			Si vous n'êtes pas redirigé, cliquez <a class=\"fblue\" href='".BASE_URL."/'>ici</a></p>";
			refreshUrl("/",5);
		}
	?>
</section>