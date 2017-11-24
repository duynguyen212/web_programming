<?php
	require_once 'core.php';

	$valid['success'] = array('success' => false, 'message' => array());

	if ($_POST) {
		$productName = $_POST['productName'];
		$productQuantity = $_POST['productQuantity'];
		$productRate = $_POST['productRate'];
		$productBrandName = $_POST['productBrandName'];
		$productCategoryName = $_POST['productCategoryName'];
		$productStatus = $_POST['productStatus'];
		
		//for product image
		$type = explode('.', $_FILES['productImage']['name']);
		$type = $type[count($type) - 1];
		$url = "../assets/images/stock/" .uniqid(rand()) . '.' . $type;
		if (in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'PNG', 'GIF', 'JPG', 'jpeg'))){
			if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {
				if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)){
					$valid['success'] = true;
					$valid['message'] = "Successfully Added";
				} else {
					return false;
				}
			}
		}
	}
?>