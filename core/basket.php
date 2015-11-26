<?php 	

		if(!isLogged()){
			if(isset($_GET['id'])){
				echo "<p>Vous ne pouvez réaliser cette action sans être connecté !</p>";
			}
			$products = array();
		}else{

			$client = $_SESSION['user']->Client;

			$products = array("join" => 
							array("left" => "vr_grp4_paniers","joinType" => array("NATURAL JOIN", "NATURAL JOIN"), "right" => array("vr_grp4_jeuxludotheque", "vr_grp4_jeux_test"))
							, "conditions" => array("Client=" => $client)
							); // Cherche les informations dans la bdd
			$products = find($bdd, $products);

			$countProducts = count($products);
			if($countProducts < 3 && isset($_GET['id'])){ // Limite le nombre de réservation à 3

				$product = array("join" => array("left" => "vr_grp4_jeux_test", "joinType" => "NATURAL JOIN", "right" => "vr_grp4_jeuxludotheque"), "conditions" => "ID_JEUX=".$_GET['id']); // Cherche les informations dans la bdd
				$product = findFirst($bdd, $product);

				if($product && $product->NbJeuxDispos != 0){ // Vérifie que le produit est dans la bdd et disponible
					$inBasket = array("table" => "vr_grp4_paniers", "conditions" => array("ID_JEUX=" => $_GET['id'],"Client=" => $client));
					$inBasket = find($bdd, $inBasket);
					
					if(!$inBasket){ // Ajoute le produit au panier si pas déjà présent
						
							$saveProduct = array("table" => "vr_grp4_paniers", "ID_JEUX" => $_GET['id'], "Client" => $client);
							save($bdd, $saveProduct); // Enregistre en bdd le produit avec le numéro de client

							$updateProduct = array("table" => "vr_grp4_jeuxludotheque", "ID_JEUX" => $_GET['id'], "NbJeuxDispos" => $product->NbJeuxDispos-1);
							save($bdd, $updateProduct, "ID_JEUX"); // Met à jour les informations du produit
							
							refreshUrl("/pages/basket.php", 0);
					}
				}else{
					echo "<p> Produit non disponible ou introuvable !</p>";
				}

			}else{

				if(isset($_GET['id'])){ // En cas de demande de réservation alors que panier plein
					echo "<p>Vous ne pouvez pas réserver plus de 3 jeux !</p>";
				}

			}

		}

		if(isset($_GET['del']) && is_numeric($_GET['del'])){ // Supprime un jeu du panier
			$product = array("join" => array("left" => "vr_grp4_paniers", "joinType" => "NATURAL JOIN", "right" => "vr_grp4_jeuxludotheque"),"conditions" => array("ID_JEUX=" => $_GET['del'], "Client=" => $client)); // Cherche les informations dans la bdd
			$product = findFirst($bdd, $product);

			if($product){
				$deleteProduct = array("table" => "vr_grp4_paniers", "conditions" => array("ID_JEUX" => $_GET['del'], "Client" => $client)); // Récupère les infos du produit dans la bdd
				delete($bdd, $deleteProduct);

				$updateProduct = array("table" => "vr_grp4_jeuxludotheque", "ID_JEUX" => $_GET['del'], "NbJeuxDispos" => $product->NbJeuxDispos + 1);
				save($bdd, $updateProduct, "ID_JEUX"); // Met à jour les informations du produit

				refreshUrl("/pages/basket.php",0);
			}
		}
		
?>