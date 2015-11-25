<?php  
	// Include of all is needed to manage site
	if(basename($_SERVER['SCRIPT_NAME']) != "index.php"){
		require_once("../const.php");
	}else{
		require_once("const.php");
	}
	require_once(ROOT."/conf/conf.php"); 
	require_once(ROOT."/core/datas.php"); 
	require_once(ROOT."/core/url.php");
	require_once(ROOT."/core/fonctions.php");
	require_once(ROOT."/core/session.php");
?>