<li id="mobile-more">
	<span id="hamburger"> Menu </span>
	<ul id="mobile-menu" class="mobileMenuHidden">
		<li>
			<a href="<?php echo BASE_URL.'/pages/news.php';?>"><span>Nouveautés</span></a>
		</li>

		<li>
			<a href='<?php echo BASE_URL.'/pages/next-releases.php';?>'><span>Prochaines Sorties</span></a>
		</li>
		<li>
			<a href='<?php echo BASE_URL.'/pages/profil.php'?>'>
			<span>
				<?php 	
						// Affiche le pseudo de l'utilisateur connecté
						if(isLogged()) echo ucfirst($_SESSION['user']->Login);
						else echo "Visiteur";
				?>
			</span>
			</a>
		</li>
		<li>
			<a href='<?php 
						if(isLogged())
								echo BASE_URL.'/?logout=1';
						else	echo BASE_URL.'/pages/register.php';
					?>'
			>	<span id="soMuchResponsiveness">
					<?php
						// Affiche le bouton correspondant à l'état de l'utilisateur (connecté/déconnecté) 
						if(isLogged()) echo "Se déconnecter"; else echo "Se connecter"; 
					?>
				</span>
			</a>
		</li>
	</ul>
</li>