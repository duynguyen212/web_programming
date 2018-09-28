<?php
	require_once 'core.php';

	$valid['success'] = array('success' => false, 'message' => array());

	if ($_POST) {
		$productName = $_POST['productName'];
		$productCode = $_POST['productCode'];
		$productQuantity = $_POST['productQuantity'];
		$productRate = $_POST['productRate'];
		$productBrandName = $_POST['productBrandName'];
		$productCategoryName = $_POST['productCategoryName'];
		$productStatus = $_POST['productStatus'];
		
		//for product image
		$type = explode('.', $_FILES['productImage']['name']);
		$type = $type[count($type) - 1];
		$url = "../assets/images/stock/" .uniqid(rand()) . '.' . $type;

		if (in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'PNG', 'GIF', 'JPG', 'JPEG'))){
			if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {
				if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)){

					//insert into database
					$sqlStr = "INSERT INTO product (product_name, product_code, product_image, brand_id, categories_id, quantity, rate, active, status) VALUES ('$productName', '$productCode', '$url', '$productBrandName', '$productCategoryName', '$productQuantity', '$productRate', 1, '$productStatus')";
					
					if($connect->query($sqlStr) == TRUE){
						$valid['success'] = true;
						$valid['message'] = "Successfully Added";	
					} else {
						$valid['success'] = false;
						$valid['message'] = "Error while adding new product";	
					}
					
				} else {
					return false;
				}
			}
		}
		
		$connect->close();

		echo json_encode($valid);
	}
?>

