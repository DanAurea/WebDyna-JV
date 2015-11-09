<header>
			
	<div id="header-wrapper">
		<div id="header-logo"></div>
		<div id="header-user-wrapper">
			<div id="header-user">
				<p><a href='<?php echo BASE_URL.'/pages/basket.php'?>'>
					Panier <img src ='<?php echo BASE_URL.'/img/basket_more.png'?>' alt="Dérouler panier">
					</a>
				</p>
				<p id="header-totalBasket">0,00 €</p>
				<p class="blue-text">Connecté en tant que :</p>
				<a href='<?php echo BASE_URL.'/pages/profil.php'?>'>Machin</a>
			</div>
		</div>
	</div>
	
	<nav>
		<ul class="level1">
			<li></li>
			<li><a href='<?php echo BASE_URL; ?>'>Accueil</a></li>
			<li>
				<a href='<?php echo BASE_URL.'/pages/games.php'?>'>Jeux</a>
				<ul class="level2">
					<li><a href='<?php echo BASE_URL.'/pages/news.php'?>'>Nouveautés</a></li>
					<li><a href='<?php echo BASE_URL.'/pages/next-releases.php'?>'>Prochaines Sorties</a></li>
				</ul>
			</li>
			<li><a href='<?php echo BASE_URL.'/pages/register.php'?>'>S'inscrire</a></li>
			<li></li>
		</ul>
	</nav>

</header>