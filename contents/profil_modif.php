<?php
	if(isset($_POST){
		$fields = array();
		foreach($_POST as $cle => $element){
			if(!empty($element)){
				$fields[] = "$cle => $element";
			}
		}
		$req = array("table" => "vr_grp4_clients",implode(",",$fields));
		save($bdd, $req, "Client");
	}
	
?>
