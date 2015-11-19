<?php   
        $servInfo = 'mysql:host='.$config['host'].';dbname='.$config['database'];

        // Connexion à la base donnée
	      try{
      		$bdd = new PDO(
            		$servInfo,$config['login'],$config['password']); 
            $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

        }catch(PDOException $e){
         	die('Impossible de se connecter à la base de donnée'); // Faire une fonction erreur
        } 

        /*
          Nettoie les champs passé en paramètres.
          @return Retourne une chaîne de caractère
         */
        function cleanFields($fields){
          if(is_array($fields)){
            return implode(', ', $fields); // Permet de transformer le tableau en chaîne de caractères
          }else{
            return $fields; // Retourne la chaîne comportant le/les champs
          }
        }

        /*
          Sélectionne la table demandée ou la jointure saisie
          @return Retourne la table sélectionnée ou la/les jointures 
         */
        function selectTable($req = array()){
          $sql = ' FROM ';

          // Choix de la table ou de la jointure
          if(isset($req['table']) && !isset($req['join'])){
            $sql .= $req['table'].' ';

          }else if(!isset($req['table']) && isset($req['join'])){
            
                // Tableau des paramètres de la jointure
                if(is_array($req['join'])){

                      // Si toutes les conditions de la jointures sont remplis on construit la requête
                      if(isset($req['join']['left']) && isset($req['join']['joinType']) && isset($req['join']['right'])){

                             $type = $req['join']['joinType'];
                             $right = $req['join']['right'];
                            
                             $sql .= $req['join']['left'].' ';
                            
                            // Vérification sur multi-jointures + construction de la requête
                            if(is_array($type) && is_array($right)){

                              // Vérifie que le nombre de paramètres est correct
                              if(count($type) == count($right)){
                                
                                // Forme les jointures multiples par ordre de leur saisie
                                foreach($type as $k => $v){
                                   if(is_numeric($k)){
                                    $multiJoin[] = "$v $right[$k]";
                                  }else{
                                    return false;
                                  }
                                }

                                $sql .= implode(' ', $multiJoin);

                              }else{ // Le nombre de paramètres est incorrect
                                return false;
                              }

                            }else if(!is_array($type) && !is_array($right)){ // Jointure unique
                              $sql .=  $type.' '.$right.' ';
                           
                            }else{
                              return false;
                            }

                            // On rajoute la condition de jointure si existante
                            if(isset($req['joinCondition'])){
                              $sql .= 'ON '.$req['joinCondition'].' ';
                            }

                      }else{ // Paramètre manquant
                        return false;
                      }

                }else{ // Jointure mal formulée
                  return false;
                }

          }else{
            return false;
          }

          return $sql;
        }
        
        /*
        	Construit une requête SQL à partir d'un tableau de paramètres
        	@req Tableau associatif comportant les éléments de la requête
          @return Retourne false si requête mal construite sinon le résultat
         */
        function find($bdd, $req = array()){
               $sql = 'SELECT ';
                     
               // Distingue les doublons
               if(isset($req['distinct'])){
                  $sql .= 'DISTINCT '.cleanFields($req['distinct']).' ';
               }else{
                 // Sélectionne les attributs à récupérer
                 if (isset($req['fields'])) {
                    $sql .= cleanFields($req['fields']).' ';
                 }else{
                    $sql .= '*';
                 }
               }
                     
               // Sélectionne la table ou établis les jointures
               if(!selectTable($req)){
                  return false;
               }else{
                  $sql .= selectTable($req);
               }
                     
               // Construction des conditions
               if(isset($req['conditions'])){
                  $sql .= 'WHERE ';
               
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
                   
                   // Inclus toutes les conditions dans la requête
                   $sql .= implode(' AND ',$cond);
                 }
               
               }
               
               
               // Groupe les champs si précisé
               if(isset($req['group'])){
                 $sql .= 'GROUP BY '.cleanFields($req['group']).' ';
                 
                 // Condition sur le groupe
                 if(isset($req['having'])){
                    $sql .= 'HAVING '.$req['having'];
                 }
               }
               
               // Tri des données avec condition si existante
               if(isset($req['order'])){
                 $sql .= 'ORDER BY '.cleanFields($req['order']).' ';
                 if(isset($req['sortBy'])){
                    $sql .= $req['sortBy'].' ';
                 }
               }
               
               // Limite le nombre de résultat
               if(isset($req['limit'])){
                  $sql .= 'LIMIT '.cleanFields($req['limit']).' ';
               }
               
               // Décale le début des résultats
               if(isset($req['offset'])){
                  $sql .= 'OFFSET '.$req['offset'];
               }
               
               $pre = $bdd->prepare($sql);
               $pre->execute();
               
               //return $sql; Débug de la requête SQL
               
               return $pre->fetchAll(PDO::FETCH_OBJ);
        }


        /*
          Retourne le premier résultat trouvé par la requête SQL
          @return Premier élément trouvé
         */
        function findFirst($bdd, $req){
          return current(find($bdd, $req));
        }
      
?>