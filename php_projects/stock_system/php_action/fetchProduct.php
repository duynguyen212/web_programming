<?php
	require_once 'core.php';

	$sqlStr = "SELECT product.product_id, product.product_name, product.product_code, product.product_image, brands.brand_name, 
				category.categories_name, product.quantity, product.rate, product.status
				FROM product 
				INNER JOIN brands ON product.brand_id = brands.brand_id 
				INNER JOIN category ON product.categories_id = category.categories_id
				WHERE product.active = 1";

	$result = $connect->query($sqlStr);
	$output = array ('data' => array());

	if($result->num_rows > 0) {
		while ($row = $result->fetch_array()) {
			//get product ID
			$productID = $row[0];

			if ($row[8] == 1) {
				$active = "<label class='label label-success'>Available</label>";
			} else {
				$active = "<label class='label label-danger'>Not Available</label>";
			}

			$button = '<!-- Single button -->
						<div class="btn-group">
						  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Action <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
						    <li><a type="button" data-toggle="modal" data-target="#editProductModal" onclick="editProduct(' . $productID .')"><i class="glyphicon glyphicon-edit"></i> Edit</a></li>
						    <li><a type="button" data-toggle="modal" data-target="#removeproductModal" onclick="removeProduct(' . $productID .')"><i class="glyphicon glyphicon-trash"></i> Remove</a></li>
						  </ul>
						</div>';

			$brand = $row[4];
			$category = $row[5];

			$imageURL = substr($row[3], 3);
			$productImage = '<img class="img-round" src="' .$imageURL.'" style="height:30px; width:50px;" />';

			$output['data'][] = array(
				$productImage,
				
				//product name
				$row[1],

				//rate
				$row[7],

				//quantity
				$row[6],

				$brand,
				$category,
				$active,
				$button
			);
		} //while
	} //if

	$connect->close();
	echo json_encode($output);
?>