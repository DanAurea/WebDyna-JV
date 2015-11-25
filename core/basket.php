<?php 

		if(isset($_GET['id'])){
			$product = array("table" => "vr_grp4_jeux_test", "conditions" => "id=".$_GET['id']);
			$product = findFirst($bdd, $product);

			if($product){
				$_SESSION['panier'][$product->ID] = $product;
			}else{
				$find = false; // Produit non trouvé;
			}
		}
		
		if(isset($_GET['del'])){
			if(array_key_exists($_GET['del'], $_SESSION['panier'])){
				unset($_SESSION['panier'][$_GET['del']]);
			}
		}
?>