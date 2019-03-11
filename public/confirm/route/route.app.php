<?php 
	if(isset($_GET['mod'])){
		$load_url = $_GET['mod'];
	}else{
		$load_url = "home";
	}

	//routes load
	//Auto Routes form URL
	//*****************************//
	//		enter routes here      //
	//*****************************//
	$file = "views/".$load_url.".page.php";
	if(file_exists($file)){
		if($load_url != ""){
			$page = $load_url;
		}
	}else if(empty($load_url) || !file_exists($file)){
		$page = "error";
	}
	
	//load require once
	$path = "views/".$page.".page.php";
	require_once ($path);

?>