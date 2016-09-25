<?php
	$url= array();
	if(isset($_GET['url']))
	{
		$url = explode("public_html/", $_GET['url']);	
	}
	if(isset($url[0])){
		 $page= $url[0].".php";

	}else{

		$page = "main.php";
	}
	include("header.php");
	include($page);
	include("footer.php");

?>
