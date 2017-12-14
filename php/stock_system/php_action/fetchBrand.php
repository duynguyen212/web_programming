<?php
	require_once 'core.php';

	$sqlStr = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_active = 1";
	$result = $connect->query($sqlStr);

	$output = array('data' => array());

	if($result->num_rows > 0){
		while ($row = $result->fetch_array()) {
			$brandID = $row[0];
			
			//status brands
			if ($row[3] == 1) {
				$brandStatus = "<label class='label label-success'>Available</label>";
			} else {
				$brandStatus = "<label class='label label-danger'>Not Available</label>";
			}

			$button = '<!-- Single button -->
						    <button class="btn btn-info" data-toggle="modal" data-target="#editBrandModal" onclick="editBrand(' . $brandID .')"><i class="glyphicon glyphicon-edit"></i> Edit</button>
						    <button class="btn btn-danger" data-toggle="modal" data-target="#removeBrandModal" onclick="removeBrand(' . $brandID .')"><i class="glyphicon glyphicon-trash"></i> Remove</button>
						';

			$output['data'][] = array(
				$row[1],
				$brandStatus,
				$button
			);
		} // end of while, fetch every record
	}

	$connect->close();
	echo json_encode($output);
?>