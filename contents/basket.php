<?php require_once(ROOT."/core/basket.php"); ?>
<table id="basket-table">
	<tr>
		<th>
			Image
		</th>
		<th>
			Article
		</th>
		<th>
			Age
		</th>
		<th>
			Type
		</th>
		<th>
			Stock
		</th>
		<th>
			Disponibilité
		</th>
		<th>
			Horaires
		</th>
		<th>
			
		</th>
	</tr>

   	<?php foreach ($products as $product): ?>
	   	<tr>
	   		<td id="img-td">
	   			<img src="<?php echo BASE_URL."/img/".$product->ID_JEUX.".png"; ?>" alt="<?php echo $product->Nom; ?>">
	   		</td>
	   		<td>
	   			<span>
	   				<?php echo $product->Nom; ?>
	   			</span>
	   		</td>
	   		<td>
	   			<p><?php echo $product->Ages; ?></p>
	   		</td>
	   		<td>
				<p><?php echo $product->Genre; ?></p>
	   		</td>
	   		<td>
	   			<p>
	   				<?php echo $product->NbJeux; ?>
	   			</p>
	   		</td>
	   		<td>
	   			<p>
	   				<?php 
	   					if($product->NbJeuxDispos == 0){ 
	   						echo "Dernier jeu";
	   					}else{
	   						echo $product->NbJeuxDispos;
	   					}  
	   				?>
	   			</p>
	   		</td>
	   		<td>
	   			<p>
	   				<?php echo "10/01/2016 10h30"; ?>
	   			</p>
	   		</td>
	   		<td>
	   			<a id="trash" href="<?php echo BASE_URL."/pages/basket.php?del=".$product->ID_JEUX; ?>"></a>
	   		</td>
	   	</tr>
	<?php endforeach; ?>
</table> 