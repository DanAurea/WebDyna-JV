<?php
	// Donne un résumé du texte passé en paramètre   
	function troncate($text, $troncate_length) {
		$text_length = strlen($text);
		
		//Si le texte est trop petit, inutile de le tronquer
		if($text_length > $troncate_length) {
			//On ne tronque pas le texte au milieu d'un mot
			while($text[$troncate_length] != ' ' && $text[$troncate_length] != '.') {
				$troncate_length++;
			}
			
			$text_troncate = substr($text, 0, $troncate_length);
			return $text_troncate. " ...";
		}
		
		return $text;
	}
	
	// Formate une date au format français
	function formatDate($date){
		return implode(" / ",array_reverse(explode("-",$date)));
	}
	
	// Retourne la page actuelle
	function currentPage(){
		if(isset($_GET['page'])){
        	if(is_numeric($_GET['page'])){
         		if($_GET['page'] > 0){
                	$page = round($_GET['page']);
                	return $page;
         		}
         	}
        }
        return 1;
	}

	$currentPage = currentPage(); // Page actuelle

?>
