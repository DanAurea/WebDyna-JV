<?php 	
		if(!empty($_POST)){
			
			if(is_numeric($_POST['Heure']) && is_numeric($_POST['Minute'])) // Vérifie que les champs sont valides
				$horaire = $_POST['Heure'].":".$_POST['Minute'].":00";
			else
				$horaire = date("H:i:s");

			$timestamp = strtotime($horaire);

			if(is_numeric($_POST['Jour']) && is_numeric($_POST['Mois']) && is_numeric($_POST['Annee'])) // Vérifie que les champs sont valides
				$date = $_POST['Annee']."/".$_POST['Mois']."/".$_POST['Jour'];
			else
				$date = date("Y/m/d");
			
		}

		if(!isset($date) && !isset($timestamp)){
			$date = date("Y:m:d");
			$timestamp = time();
		}

		if(!isLogged()){ // Vérifie que l'utilisateur est connecté
			
			if(isset($_GET['id'])){
				echo "<p class=\"fred ferror\" class=\"fred ferror\">Vous ne pouvez réaliser cette action sans être connecté !</p>";
				refreshUrl("/", 5);
			}

			$products = array(); // Panier vide (affichage)

		}else{

					$client = $_SESSION['user']->Client; 

					$products = array("join" => 
									array("left" => "vr_grp4_paniers","joinType" => array("NATURAL JOIN", "NATURAL JOIN"), "right" => array("vr_grp4_jeuxludotheque", "vr_grp4_jeux_test"))
									, "conditions" => array("Client=" => $client)
									); // Cherche les informations dans la bdd
					$products = find($bdd, $products); // Listes les produits lié à l'utilisateur connecté
					
					$countProducts = count($products);

					if($countProducts < 3 && isset($_GET['id'])){ // Limite le nombre de réservation à 3

								$product = array("join" => array("left" => "vr_grp4_jeux_test", "joinType" => "NATURAL JOIN", "right" => "vr_grp4_jeuxludotheque"), 
												"conditions" => "ID_JEUX=".$_GET['id']); // Cherche les informations dans la bdd

								$product = findFirst($bdd, $product); // Récupère le premier produit correspondant

								if($product && $product->NbJeuxDispos != 0){ // Vérifie que le produit est dans la bdd et disponible
									
									$inBasket = array("table" => "vr_grp4_paniers", "conditions" => array("ID_JEUX = " => $_GET['id'],"Client = " => $client));
									$inBasket = findFirst($bdd, $inBasket); // Vérifie que le produit n'est pas déjà existant
									
									if(!$inBasket){ // Ajoute le produit au panier si pas déjà présent
										
											$saveProduct = array("table" => "vr_grp4_paniers", "ID_JEUX" => $_GET['id'], "Client" => $client, "Date" => $date, "Timestamp" => $timestamp);
											save($bdd, $saveProduct); // Enregistre en bdd le produit avec le numéro de client

											$updateProduct = array("table" => "vr_grp4_jeuxludotheque", "ID_JEUX" => $_GET['id'], "NbJeuxDispos" => $product->NbJeuxDispos-1);
											save($bdd, $updateProduct, "ID_JEUX"); // Met à jour les informations du produit
											
											refreshUrl("/pages/basket.php", 0);
									}
								}else{
										echo "<p class=\"fred ferror\" class=\"fred ferror\"> Produit non disponible ou introuvable !</p>";
								}

					}else{

						if(isset($_GET['id'])){ // En cas de demande de réservation alors que panier plein
							echo "<p class=\"fred ferror\" class=\"fred ferror\">Vous ne pouvez pas réserver plus de 3 jeux !</p>";
						}

					}

		}

		if(isset($_GET['del']) && is_numeric($_GET['del'])){ // Supprime un jeu du panier
			
			$product = array("join" => array("left" => "vr_grp4_paniers", "joinType" => "NATURAL JOIN", "right" => "vr_grp4_jeuxludotheque"),"conditions" => array("ID_JEUX=" => $_GET['del'], "Client=" => $client)); // Cherche les informations dans la bdd
			$product = findFirst($bdd, $product); // Trouve le produit correspondant pour vérifier que le produit existe bien

			if($product){
					$deleteProduct = array("table" => "vr_grp4_paniers", "conditions" => array("ID_JEUX" => $_GET['del'], "Client" => $client)); // Récupère les infos du produit dans la bdd
					delete($bdd, $deleteProduct);

					$updateProduct = array("table" => "vr_grp4_jeuxludotheque", "ID_JEUX" => $_GET['del'], "NbJeuxDispos" => $product->NbJeuxDispos + 1);
					save($bdd, $updateProduct, "ID_JEUX"); // Met à jour les informations du produit

					refreshUrl("/pages/basket.php",0);
			}
		}
		
?>