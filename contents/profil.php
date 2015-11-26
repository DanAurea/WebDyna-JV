<section class="login left outred">
	<div class="border-top red></div>
	<h1 class ="fred">Profil</h1>
	<?php
	if(!empty($SESSION['user']): ?>{
	<ol>
		<li>
			<span>Pseudo : </span>
			<?php echo $SESSION['user']->Login; ?>
		</li>
		<li>
			<span>Mot de passe : </span>
			<?php echo "****"; ?>
		</li>
		<li>
			<span>Prenom : </span>
			<?php echo $SESSION['user']->Prenom; ?>
		</li>
		<li>
			<span>Nom : </span>
			<?php echo $SESSION['user']->Nom; ?>
		</li>
		<li>
			<span>Adresse mail : </span>
			<?php echo $SESSION['user']->Email; ?>
		</li>
	</ol>
	<?php endif;
	if(empty($SESSION['user']){ 
		echo "<p>Vous etes perdu ? Vous allez etre redirigé.<br/>
		Si vous n'etes pas redirigé, cliquez <a href="ROOT./">ici</a></p>";
		refreshUrl("/",5);
	}
	?>
