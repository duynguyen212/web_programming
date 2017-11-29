<?php
	require_once 'core.php';

	$sqlStr = "SELECT product.product_id, product.product_name, product.product_code, product.product_image, product.brand_id, 
				product.categories_id, product.quantity, product.rate, product.active
				FROM product 
				INNER JOIN brands ON product.brand_id = brands.brand_id 
				INNER JOIN category ON product.categories_id = category.categories_id
				WHERE product.active = 1";

	$result = $connect->query($sqlStr);
	$output = array ('data' => array());

	if($result-> num_rows >0) {
		$active = "";

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
						    <button class="btn btn-success" data-toggle="modal" data-target="#editProductModal" onclick="editProduct(' . $productID .')"><i class="glyphicon glyphicon-edit"></i> Edit</a></li>
						    <button class="btn btn-danger" data-toggle="modal" data-target="#removeBrandModal" onclick="removeProduct(' . $productID .')"><i class="glyphicon glyphicon-trash"></i> Remove</a></li>
						  
						</div>';
		}
	}
?>