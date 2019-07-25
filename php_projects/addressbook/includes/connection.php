<?php
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "clientaddressbook";

	$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	if(!$conn)
	{
		die("Connection was failed. " . mysqli_connect_error());
	}
	
?>