<?php   
        $servInfo = 'mysql:host='.$config['host'].';dbname='.$config['database'];

        // Connexion à la base donnée
	      try{
      		$bdd = new PDO($servInfo,$config['login'],$config['password']); 
          
          $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING); // Active les erreurs PDO
          $bdd->exec("SET CHARACTER SET utf8"); // Définis l'encodage UTF8 pour la bdd

        }catch(PDOException $e){
          die('Impossible de se connecter à la base de donnée'); // Faire une fonction erreur
        } 

        /**
        *  Nettoie les champs passé en paramètres.
        *  @param fields Champs à mettre en forme proprement
        *  @param return Retourne une chaîne de caractère
        */
        function cleanFields($fields){
          if(is_array($fields)){
            $fields = implode(', ', $fields); // Permet de transformer le tableau en chaîne de caractères
          }
            return $fields; // Retourne la chaîne comportant le/les champs
        }

        /**
        *  Sélectionne la table demandée ou la jointure saisie
        *  @param req Requête à éxécuter
        *  @return return Retourne la table sélectionnée ou la/les jointures 
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

          }else{ // Tableau de requête mal construit
            return false;
          }

          return $sql;
        }
        
        include(ROOT."/core/commandSQL.php"); // Inclus les différentes clauses SQL

        /**
        *	Construit une requête SQL à partir d'un tableau de paramètres
        *   @param bdd Base de donnée PDO
        *	@param req Tableau associatif comportant les éléments de la requête
        *   @param return Retourne false si requête mal construite sinon le résultat
        */
        function find($bdd, $req = array()){
            $sql = 'SELECT ';
             
            $sql .= distinct($bdd, $req);
             
            // Sélectionne la table ou établis les jointures
            if(!selectTable($req)){
                return false;
            }else{
                $sql .= selectTable($req);
            }
             
            $sql .= where($bdd, $req);
             
            $sql .= groupBy($bdd, $req);
             
            $sql .= orderBy($bdd, $req);
             
            $sql .= limit($bdd, $req);
             
            $pre = $bdd->prepare($sql);
            $pre->execute();
             
            //return $sql; //Débug de la requête SQL
             
            return $pre->fetchAll(PDO::FETCH_OBJ);
        }


        /**
        *  Retourne le premier résultat trouvé par la requête SQL
        *  @param bdd Base de données PDO
        *  @param req Requête à éxécuter
        *  @param return Premier élément trouvé
        */
        function findFirst($bdd, $req){
            return current(find($bdd, $req));
        }

        /**
        *  Insère dans la bdd les valeurs passées en paramètre
        *  @param bdd Base de données PDO
        *  @param data Données à insérer/mettre à jour
        *  @param primaryKey Définis la clé primaire pour l'update
        */
        function save($bdd, $data, $primaryKey = false){
            $fields =  array(); // Champs à mettre à jour
            $d = array(); // Tableau des données formatées

            foreach($data as $k=>$v){
                if($k != $primaryKey && $k != "table"){ // Formate les clés et ne prends pas en compte la clé primaire pour l'insert
                    $fields[] = "$k=:$k";
                    $d[":$k"] = ( is_array($v) ) ? serialize( $v ) : $v ; // Linéarise la valeur si c'est un tableau + formate les données
                }elseif(!empty($v) && $k != "table"){
                    $d[":$k"] = $v;
                }          
            }

            /*  Met à jour les tuples concernés si la clé primaire a été définis 
                et sa valeur n'est pas false sinon insère les données
            */
            if(isset($primaryKey) && $primaryKey){
                $sql = 'UPDATE '.$data['table'].' SET '.implode(',',$fields).' WHERE '.$primaryKey.'=:'.$primaryKey;
            }
            else
            {
                $sql = 'INSERT INTO '.$data['table'].' SET '.implode(',',$fields);
            }

            $pre = $bdd->prepare($sql);
            $pre->execute($d); // Exécute la requête préparée en y intégrant les données formatées

            return $sql;
        }

        /**
        * Permet de supprimer un tuple dans la BDD
        * @param  boolean $id  [description]
        * @param  array   $req [description]
        * @return [type]       [description]
        */
        function delete($bdd, $req = array()){
            $sql = "DELETE FROM ";

            if(!empty($req)){ // Vérifie que la requête n'est pas vide

                if(isset($req['table'])){ // Vérifie que la table a été définie
                    $sql .= $req['table'];
                }else{
                    return false;
                }

                $sql .= " WHERE ";

                if(isset($req['conditions'])){ // Vérifie que les condtions ont été définies
                
                    if(!is_array($req['conditions'])){ // Traitement des données
                        $sql .= $req['conditions'];
                    }else{

                        $cond = array();
                       
                        foreach($req['conditions'] as $k=>$v){
                            if(!is_numeric($v) && !is_array($v)){
                                $v = $bdd->quote($v);
                            }
                           
                            $cond[] = "$k=$v";
                        }
                        $sql .= implode(' AND ',$cond);
                    }

                }else{
                    return false;
                }

            }

            $bdd->query($sql);
            return $sql;
        }

        /**
        *   Vérifie que le mot de passe est valide
        *   @param $password Mot de passe à valider
        *   @return Retourne true si valide
        */
        function validPassword($password){
            
            if(preg_match("#^[a-zA-Z0-9]{4,32}$#", $password)){ // Expression régulière vérifiant la validité du mot de passe
                return true;
            }

            return false;
        }

        /**
        *   Vérifie que le pseudo est valide
        *   @param $pseudo Pseudo à valider
        *   @return Retourne true si valide
        */
        function validPseudo($pseudo){
            
            if(preg_match("#^[a-zA-Z0-9]{4,16}$#", $pseudo)){ // Expression régulière vérifiant la validité du pseudo
                return true;
            }

            return false;
        }


        /**
        * Vérifie que les données ont le bon format
        * @param  $validate Tableau de paramètre vérifiant l'authenticité des données
        * @param  $data Données à vérifier
        * @return Retourne vraie si bon format
        */
        function validates($validate, $datas){
            $errors = array();
        
            foreach($validate as $k => $v){
                if(!isset($datas["$k"])){
                    $errors[$k] = $v['message']; // Dans le cas d'une donnée vide
                }else{

                    if($v['rule'] == 'password'){ // Vérifie les données en cas de règle de validation password

                        if(!validPassword($datas["$k"])){ // Si le mot de passe n'est pas de la bonne forme
                            $errors["$k"] = $v["message"]; // On remplis le tableau d'une erreur
                        }

                    }

                    if($v['rule'] == 'pseudo'){ // Vérifie les données en cas de règle de validation password

                        if(!validPseudo($datas["$k"])){ // Si le pseudo n'est pas de la bonne forme
                            $errors["$k"] = $v["message"]; // On remplis le tableau d'une erreur
                        }

                    }

                }

            }

             if(empty($errors)){
                    return true;
                }
                    return $errors;
        }
?>
