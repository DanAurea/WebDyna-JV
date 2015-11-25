<?php 	
		$countProducts = count($_SESSION['panier']); // Compte le nombre de produit actuellement dans le panier.

		if(!isLogged() && isset($_GET['id'])){
			echo "<p>Vous ne pouvez réaliser cette action sans être connecté !</p>";
		}else{
			if($countProducts < 3 && isset($_GET['id'])){ // Limite le nombre de réservation à 3

				if(!isset($_SESSION['panier'][$_GET['id']]) ){ // Ajoute le produit au panier si pas déjà présent
					
					$product = array("table" => "vr_grp4_jeux_test", "conditions" => "id=".$_GET['id']); // Cherche les informations dans la bdd
					$product = findFirst($bdd, $product);
					if($product){ // Vérifie que le produit est bien dans la bdd
						$_SESSION['panier'][$product->ID] = $product;
					}else{
						$find = false; // Produit non trouvé;
					}
				}

			}else{

				if(isset($_GET['id'])){ // En cas de demande de réservation alors que panier plein
					echo "<p>Vous ne pouvez pas réserver plus de 3 jeux !</p>";
				}

			}
		}

		if(isset($_GET['del'])){ // Supprime un jeu du panier
			if(array_key_exists($_GET['del'], $_SESSION['panier'])){ // Vérifie que le jeu est bien dans le panier
				unset($_SESSION['panier'][$_GET['del']]);
			}
		}
		
		
?>