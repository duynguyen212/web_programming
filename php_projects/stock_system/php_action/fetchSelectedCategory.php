<?php
	require_once 'core.php';

	$categoryId = $_POST['categoryID'];

	$sqlStr = "SELECT categories_id, categories_name, categories_active, categories_status FROM category WHERE categories_id = $categoryId";

	$result = $connect->query($sqlStr);

	if($result->num_rows > 0) {
		$row = $result -> fetch_array();
	} //if there is at least one row

	$connect->close();

	echo json_encode($row);
?>