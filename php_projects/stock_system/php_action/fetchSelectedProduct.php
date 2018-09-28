<?php
	require_once "core.php";

	$productID = $_POST['productID'];

	$sqlStr = "SELECT product_id, product_name, product_code, product_image, brand_id, categories_id, quantity, rate, status FROM product WHERE product_id = $productID";
	
	$result = $connect->query($sqlStr);

	if ($result->num_rows > 0) {
		$row = $result->fetch_array();
	} //if has at least 1 record
 
	$connect->close();

	echo json_encode($row);
?>