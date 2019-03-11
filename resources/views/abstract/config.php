<?php
$host = env('DB_HOST', 'localhost');
	$user   = env('DB_USERNAME', 'forge');
	$pass   = env('DB_PASSWORD', 'forge');
	$db     = env('DB_DATABASE', 'forge');

$con = mysqli_connect($host,$user,$pass,$db);
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_set_charset($con,"utf8");
?>
