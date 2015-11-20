<?php   
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
	
	/*$text_to_troncate = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. ' In eu sapien tellus. Nulla pharetra tincidunt vestibulum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis ut orci ultrices turpis hendrerit lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut facilisis euismod facilisis. Etiam ac odio sed nulla pretium tincidunt at quis tortor. Nam condimentum malesuada risus, id hendrerit nulla pulvinar a. Praesent at tempor neque. Mauris facilisis ipsum at tortor facilisis condimentum. Duis et erat nec quam finibus tempor non non nibh. Nulla eget neque lectus. Sed sit amet sapien fermentum, pharetra orci sit amet, mollis felis. Nulla a fringilla sapien.

Nunc fringilla, nisl ut rutrum molestie, nulla lorem laoreet ipsum, sit amet consectetur leo felis ac diam. Proin facilisis magna et nunc feugiat imperdiet. Cras sollicitudin eros vitae urna convallis vulputate. Ut efficitur eget odio nec posuere amet.";

	echo $text_to_troncate. "<br /> <br />";

	$text_troncated = troncate($text_to_troncate, 300);
	echo $text_troncated; //Pour essayer*/
	
?>
