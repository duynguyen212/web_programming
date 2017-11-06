<?php
	require_once 'core.php';

	$brandId = $_POST['brandID'];

	$sqlStr = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_id = $brandId";

	$result = $connect->query($sqlStr);

	if($result->num_rows > 0) {
		$row = $result -> fetch_array();
	} //if there is at least one row

	$connect->close();

	echo json_encode($row);
?>