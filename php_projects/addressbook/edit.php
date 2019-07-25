<?php
	session_start();

	// check user is logged in
	if (!isset($_SESSION['loggedInUser']))
	{
		header("Location: index.php");
	}

	// connect to DB, and functions
	include("includes/connection.php");
	include("includes/functions.php");

	$clientId = $_GET['id'];
	
	$queryStr = "SELECT * FROM clients WHERE id='$clientId'";

	$result = mysqli_query($conn, $queryStr);

	if (mysqli_num_rows($result) > 0) 
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			$clientName = $row['name'];
			$clientEmail = $row['email'];
			$clientPhone = $row['phone'];
			$clientAddress = $row['address'];
			$clientCompany = $row['company'];
			$clientNotes = $row['notes'];
		}
	} 
	else
	{
		// we have no data 
		$alertMessage =  "<div class='alert alert-success'>No records in our system. <a href='clients.php'>
							Back to homepage</a> </div>";
	}

	// update data
	if(isset($_POST['update']))
	{
		
		$clientName = validateFormData($_POST['clientName']);
		$clientEmail = validateFormData($_POST['clientEmail']);
		$clientPhone = validateFormData($_POST['clientPhone']);
		$clientAddress = validateFormData($_POST['clientAddress']);
		$clientCompany = validateFormData($_POST['clientCompany']);
		$clientNotes = validateFormData($_POST['clientNotes']);

		$queryStr = "UPDATE clients 
					SET 
						name = '$clientName', 
						email = '$clientEmail',
						phone = '$clientPhone', 
						address = '$clientAddress',
						company = '$clientCompany',
						notes = '$clientNotes'
					WHERE 
						id = $clientId";

		$result = mysqli_query($conn, $queryStr);

		// if query was successful
		if($result)
		{
				// refresh page with query string
				header("Location: clients.php?alert=updatesuccess");
		}
		else
		{
			// something went wrong
			echo "Error: " .$queryStr ."<br>" . mysqli_error($conn);
		}
	}

	// delete data
	if(isset($_POST['delete']))
	{
		$alertMessage = "<div class='alert alert-warning'><p>Are you sure to delete this client? </p> <br>
							<form action='". htmlspecialchars($_SERVER['PHP_SELF']) . "?id=$clientId' method='post'>
								<input type='submit' class='btn btn-danger btn-sm' name='confirm-delete' value='Yes, delete'>
								<a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>No, thanks</a>
							</form>
						</div>";
	}

	// if delete confirm was submitted
	if(isset($_POST['confirm-delete']))
	{
		$queryStr = "DELETE FROM clients WHERE id=$clientId";
		$result = mysqli_query($conn, $queryStr);

		if($result)
		{
			//redirect to clients.php with a query string
			header("Location: clients.php?alert=deleted");
		}
		else
		{
			echo "Error: " . mysqli_error($conn);
		}
	}
	
	include("includes/header.php");
?>

<h1>Edit Client</h1>

<?php
	echo $alertMessage;
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id=<?php echo $clientId; ?>" method="post" class="row">
	<div class="form-group col-sm-6">
		<label for="clientName">Name <i style="font-size: 6px;" class="fas fa-circle"></i></label>
		<input type="text" class="form-control input-lg" name="clientName" required="required" value="<?php echo $clientName; ?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="clientEmail">Email <i style="font-size: 6px;" class="fas fa-circle"></i></label>
		<input type="email" class="form-control input-lg" name="clientEmail" required="required"  value="<?php echo $clientEmail; ?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="clientPhone">Phone</label>
		<input type="text" class="form-control input-lg" name="clientPhone" value="<?php echo $clientPhone; ?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="clientAddress">Address</label>
		<input type="text" class="form-control input-lg" name="clientAddress"  value="<?php echo $clientAddress; ?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="clientCompany">Company</label>
		<input type="text" class="form-control input-lg" name="clientCompany"  value="<?php echo $clientCompany; ?>">
	</div>
	<div class="form-group col-sm-6">
		<label for="clientNotes">Notes</label>
		<textarea name="clientNotes" class="form-control input-lg"><?php echo $clientNotes; ?></textarea>
	</div>
	<div class="col-sm-12 text-info">
		(<i style="font-size: 6px;" class="fas fa-circle"></i>) All fields are required
	</div>
	
	<div class="col-sm-12">
		<hr>
		<button type="submit" class="btn btn-danger btn-sm" name="delete"><i class="fas fa-trash-alt"></i> Delete</button>
	
		<button style="margin-left: 7px;" type="submit" class="btn btn-success btn-sm pull-right"  name="update">
			<i class="fas fa-save"></i> Update</button>
		<a href="clients.php" class="btn btn-sm btn-default pull-right">Cancel</a> 	
	</div>
</form>

<?php
	include("includes/footer.php");
?>