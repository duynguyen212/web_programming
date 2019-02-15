<?php
	//creating connection to MySQL DB

	$db_host = "localhost";
	$db_name = "quizzer";
	$db_user = "root";
	$db_pass = "0212";

	//creating mysql object
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

	//Error handle
	if ($mysqli->connect_error) {
		printf("Connection was failed %s\n", $mysqli->connect_error);
		exit();
	}
