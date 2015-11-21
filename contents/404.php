<?php 
// Message personnalisé pour la page 404
$subtitle = array(	'break' => 'C\'est malin tout est cassé !', 
					'42' => 'La réponse à la vie n\'est pas ici !',
					'lego' => 'Les legos sous les pieds ça fait mal !'
				);
$randKey = array_rand($subtitle,1); // Tirage aléatoire parmis les messages
?>
<section class="center error">
	<p id ="error-message"> Erreur 404: Page Introuvable !</p>
	<p id ="error-subtitle"> <?php echo $subtitle[$randKey]; ?></p>
	<img src='<?php echo BASE_URL.'/img/'.$randKey.'.jpg' ?>'>
</section>