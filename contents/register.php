<section class="login left outred">
		<div class="border-top red"></div>
		<h1 class="fred">Login </h1>
		<form method="Post" action="login.php">
			<ol>
				<li>
					<label for="pseudo">Pseudo:</label>
					<input type="text" name="pseudo" placeholder="Pseudo"/>
				</li>
				<li>
					<label for="password">Mot de passe:</label>
					<input type="password" name="password" placeholder="******"/>
				</li>
			</ol>
			
			<input id="login" type="submit" value="Se connecter" />
		</form>	
</section>

<section class="register right outgreen">
		<div class="border-top green"></div>
		<h1 class="fgreen"> S'inscrire </h1>
		<form method="Post" action="inscription.php">
		
		<ol>
			<li>
				<label for="pseudo">Pseudo :</label>
				<input type="text" name="pseudo" placeholder="Pseudo"/>
			</li>
			<li>
				<label for="email">Adresse email:</label>
				<input type="text" name="email" placeholder="John.Doe@gmail.com"/>
			</li>
			<li>
				<label for="password">Mot de passe:</label>
				<input type="password" name="password" placeholder="******"/>
			</li>
			<li>
				<label for="pass_conf"> Confirmation:</label>
				<input type="password" name="pass_conf" placeholder="******"/>
			</li>
		</ol>	
			
			<input type="submit" value="S'inscrire" />
		</form>
</section>
		
