<<<<<<< HEAD
<aside class="news left outorange">
	<div class="border-top orange"></div>
	<div class="border-bottom"></div>
	<h1 class="forange">Nouveautés</h1>
	
	<div class="grid">
		<ul id="grid-news">
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>
		</ul>
	</div>
</aside>

<section class="container-reviews center outred">
	<div class="border-top red"></div>
	<div class="border-bottom"></div>
	<h1 class="fred">Tests</h1>
	
	<article class="reviews">
		<img src='<?php echo BASE_URL.'/img/pokemon_emeraude.png'?>' alt="Pokémon Emeraude" />
		<h2 class="fred title-review">Pokémon Emeraude :</h2>
		<p class="type fyellow">Genre du jeu : RPG / Aventure</p>
		<p class="text-review">Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d'autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d'extorquer de l'argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.</p>
		<a href="#" class="more">Lire la suite</a>
	</article>
	
	<article class="reviews">
		<img src='<?php echo BASE_URL.'/img/pokemon_rubis.png'?>' alt="Pokémon Emeraude" />
		<h2 class="fred title-review">Pokémon Rubis :</h2>
		<p class="type fyellow">Genre du jeu : RPG / Aventure</p>
		<p class="text-review">Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d'autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d'extorquer de l'argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.</p>
		<a href="#" class="more">Lire la suite</a>
	</article>

	<article class="reviews">
		<img src='<?php echo BASE_URL.'/img/pokemon_saphir.png'?>' alt="Pokémon Emeraude" />
		<h2 class="fred title-review">Pokémon Saphir :</h2>
		<p class="type fyellow">Genre du jeu : RPG / Aventure</p>
		<p class="text-review">Un gosse de 11 ans part braconner des animaux afin de les faire combattre avec d'autres dresseurs, dans le but de blesser mortellement les pauvres créatures et d'extorquer de l'argent aux braconniers. Le but ultime est de vaincre une mafia rampante et de terrasser le Conseil des 4, afin de devenir le plus grand dresseur de tous les temps.</p>
		<a href="#" class="more">Lire la suite</a>
	</article>

</section>

<aside class="next-releases right outgreen">
	<div class="border-top green"></div>
	<div class="border-bottom"></div>
	<h1 class="fgreen">Prochaines sorties</h1>

	<div class="grid">
		<ul id="grid-releases">
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>
			<li>
				<a href="#">
					<img src='<?php echo BASE_URL.'/img/poke.jpg'?>' alt="pokemon emeraude">
					<span>Pokémon</span>
				</a>
			</li>

		</ul>
	</div>
</aside>
=======
<?php
	$pseudo=$_POST["pseudo"];
	$password=$_POST["password"];
	$user=array("table"=>"Utilisateur","conditions"=>array("Login="=>$pseudo,"MotDePasse="=>$password));
	var_dump(findFirst($bdd,$user));
?>
>>>>>>> ecdeed828d8f5fa2eb3c16cb533436d438c11552
