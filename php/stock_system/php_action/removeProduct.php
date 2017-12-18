<?php
	require_once 'core.php';

	$valid['success'] = array('success' => false, 'message' => array());

	$productID = $_POST['productID'];

	if ($productID) {
		$sqlStr = "DELETE FROM product WHERE product_id = $productID";

		if ($connect->query($sqlStr) === TRUE) {
			$valid['success'] = true;
			$valid['message'] = "Successfully Removed";
		} else {
			$valid['success'] = false;
			$valid['message'] = "Error while removing";
		}

		$connect->close();
		
		echo json_encode($valid);
	}
