<div class="pagination">
		<ul>
			<?php 
					// Crée la pagination en fonction du nombre d'éléments disponible dans la bdd
					for ($i=1; $i <= $pages ; $i++) { 
						echo "<li>";
						echo "<a href =\"".BASE_URL."/".$where."?page=".$i."\" >";
						echo $i;
						echo "</a>";
						echo "</li>";
					} 
			?>
		</ul>
</div>