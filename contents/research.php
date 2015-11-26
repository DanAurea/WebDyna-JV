<section class="container-review center outred">
	<div class="border-top red"></div>
	<div class="border-bottom"></div>
	<h1 class="fred">RŽsultats de la recherche</h1>

	<!-- Construction de la requte -->
	<?php
		$requete = 
		if(isset($_POST['search_name'])) {
			echo $_POST['search_name'];
		} else {
			echo "Nope";
		}
	?>

</section>
