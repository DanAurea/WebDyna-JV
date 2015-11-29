<li id="mobile-more">
	<span> Menu </span>
	<ul id="mobile-menu" class="mobileMenuHidden">
		<li>
			<a href="<?php echo BASE_URL.'/pages/news.php';?>">Nouveautés</a>
		</li>

		<li>
			<a href='<?php echo BASE_URL.'/pages/next-releases.php';?>'>Prochaines Sorties</a>
		</li>
		<li>
			<a href='<?php echo BASE_URL.'/pages/profil.php'?>'>
				<?php 	
						// Affiche le pseudo de l'utilisateur connecté
						if(isLogged()) echo ucfirst($_SESSION['user']->Login);
						else echo "Visiteur";
				?>
			</a>
		</li>
		<li>
			<a href='<?php 
						if(isLogged())
								echo BASE_URL.'/?logout=1';
						else	echo BASE_URL.'/pages/register.php';
					?>'
			>
				<?php
					// Affiche le bouton correspondant à l'état de l'utilisateur (connecté/déconnecté) 
					if(isLogged()) echo "Se déconnecter"; else echo "Se connecter"; 
				?>
			</a>
		</li>
	</ul>
</li>