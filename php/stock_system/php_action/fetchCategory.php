<?php
	require_once 'core.php';

	$sqlStr = "SELECT categories_id, categories_name, categories_active, categories_status FROM category WHERE categories_active = 1 ORDER BY categories_id DESC";
	$result = $connect->query($sqlStr);

	$output = array('data' => array());

	if($result->num_rows > 0){
		while ($row = $result->fetch_array()) {
			$categoryID = $row[0];
			
			//status categories
			if ($row[3] == 1) {
				$categoryStatus = "<label class='label label-success'>Available</label>";
			} else {
				$categoryStatus = "<label class='label label-danger'>Not Available</label>";
			}

			$button = '<button type="button" class="btn btn-info"data-toggle="modal" data-target="#editCategoryModal" onclick="editCategory(' . $categoryID .')"><class="glyphicon glyphicon-edit"></i> Edit</button>
						<button type="button" class="btn btn-danger"data-toggle="modal" data-target="#removeCategoryModal" onclick="removeCategory(' . $categoryID .')"><class="glyphicon glyphicon-trash"></i> Remove</button>';

			$output['data'][] = array(
				$row[1],
				$categoryStatus,
				$button
			);
		} // end of while, fetch every record
	}

	$connect->close();
	echo json_encode($output);
?>