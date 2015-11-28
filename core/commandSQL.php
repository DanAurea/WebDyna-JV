<?php	
	
	/**
	 * Construit la clause DISTINCT
	 * @param   $bdd Base de données
	 * @param   $req La requête
	 * @return 	Retourne la clause correctement définie 
	 */
	function distinct($bdd, $req){
		// Distingue les doublons
		if(isset($req['distinct'])){
			$sql = ' DISTINCT '.cleanFields($req['distinct']).' ';
		}else{
			// Sélectionne les attributs à récupérer
			if (isset($req['fields'])) {
				$sql = cleanFields($req['fields']).' ';
			}else{
				$sql = '*';
			}
		}
		return $sql;
	}

	/**
	 * Construit la clause WHERE
	 * @param   $bdd Base de données
	 * @param   $req La requête
	 * @return 	Retourne la clause correctement définie 
	 */
	function where($bdd, $req){
		// Construction des conditions
		if(isset($req['conditions'])){
			$sql = ' WHERE ';
		
			if(!is_array($req['conditions'])){
				$sql .= $req['conditions'];
			}else{
				$cond = array();
				
				// Traitement des conditions
				foreach($req['conditions'] as $k=>$v){
					// Protection injection SQL
					if(!is_numeric($v)){
						$v = $bdd->quote($v);
					}
				
					/* 
					Lie le champ + l'opérateur avec la valeur
					Par exemple "nom=" => "Marvin" : "nom= Marvin"
					Ne pas oublier d'inclure l'opérateur dans l'indice
					*/
					$cond[] = "$k $v";
				}
				
				if(isset($req["operator"])){
					// Inclus toutes les conditions dans la requête
					$sql .= implode(' '.$req["operator"].' ',$cond);
				}else{
					// Inclus toutes les conditions dans la requête
					$sql .= implode(' AND ',$cond);
				}

			}
		return $sql;
		}else{
			return '';
		}
	}

	/**
	 * Groupe les résultats
	 * @param   $bdd Base de données
	 * @param   $req La requête
	 * @return 	Retourne la clause correctement définie 
	 */
	function groupBy($bdd, $req){
		// Groupe les champs si précisé
		if(isset($req['group'])){
			$sql = ' GROUP BY '.cleanFields($req['group']).' ';
		
			// Condition sur le groupe
			if(isset($req['having'])){
				$sql .= ' HAVING '.$req['having'];
			}
		return $sql;
		}
		return '';
	}

	/**
	 * Ordonne les résultats
	 * @param   $bdd Base de données
	 * @param   $req La requête
	 * @return 	Retourne la clause correctement définie 
	 */
	function orderBy($bdd, $req){
		// Tri des données avec condition si existante
        if(isset($req['order'])){
            $sql = ' ORDER BY '.cleanFields($req['order']).' ';
            if(isset($req['sortBy'])){
                $sql .= $req['sortBy'].' ';
            }
        return $sql;
        }
        return '';
	}

	/**
	 * Limite les résultats
	 * @param   $bdd Base de données
	 * @param   $req La requête
	 * @return 	Retourne la clause correctement définie 
	 */
	function limit($bdd, $req){
		// Limite le nombre de résultat
        if(isset($req['limit'])){
            $sql = ' LIMIT '.cleanFields($req['limit']).' ';
             
            // Décale le début des résultats
            if(isset($req['offset'])){
                $sql .= ' OFFSET '.$req['offset'];
            }
        return $sql;
        }
        return '';
	}

?>