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

	if(isset($_POST['add']))
	{
		//set all variables to empty by default
		$clientName = $clientEmail = $clienPhone = $clienAddress = $clienCompany = $clienNotes = "";

		if(!$_POST['clientName'])
		{
			$nameErr = "Please enter a name <br>";
		}
		else
		{
			$clientName = validateFormData($_POST['clientName']);
		}
		
		if(!$_POST['clientName'])
		{
			$emailErr = "Please enter an email <br>";
		}
		else
		{
			$clientEmail = validateFormData($_POST['clientEmail']);
		}

		$clientPhone = validateFormData($_POST['clientPhone']);
		$clientAddress = validateFormData($_POST['clientAddress']);
		$clientCompany = validateFormData($_POST['clientCompany']);
		$clientNotes = validateFormData($_POST['clientNotes']);

		if ($clientEmail && $clientName)
		{
			$queryStr = "INSERT INTO clients (name, email, phone, address, company, notes, date_added) 
						VALUES('$clientName', '$clientEmail', '$clientPhone', '$clientAddress', 
						'$clientCompany', '$clientNotes', CURRENT_TIMESTAMP)";

			$result = mysqli_query($conn, $queryStr);

			// if query was successful
			if($result)
			{
				// refresh page with query string
				header("Location: clients.php?alert=success");
			}
			else
			{
				// something went wrong
				echo "Error: " .$queryStr ."<br>" . mysqli_error($conn);
			}
		}
	}

	include("includes/header.php");
?>

<h1>Add Client</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="row">
	<div class="form-group col-sm-6">
		<label for="clientName">Name <i style="font-size: 6px;" class="fas fa-circle"></i></label>
		<input type="text" class="form-control" name="clientName" required="required">
	</div>
	<div class="form-group col-sm-6">
		<label for="clientEmail">Email <i style="font-size: 6px;" class="fas fa-circle"></i></label>
		<input type="email" class="form-control" name="clientEmail" required="required">
	</div>
	<div class="form-group col-sm-6">
		<label for="clientPhone">Phone</label>
		<input type="text" class="form-control" name="clientPhone">
	</div>
	<div class="form-group col-sm-6">
		<label for="clientAddress">Address</label>
		<input type="text" class="form-control" name="clientAddress">
	</div>
	<div class="form-group col-sm-6">
		<label for="clientCompany">Company</label>
		<input type="text" class="form-control" name="clientCompany">
	</div>
	<div class="form-group col-sm-6">
		<label for="clienNotes">Notes</label>
		<textarea name="clientNotes" class="form-control"></textarea>
	</div>
	<div class="col-sm-12 text-info">
		(<i style="font-size: 6px;" class="fas fa-circle"></i>) All fields are required
	</div>
	
	<button style="margin-left: 7px;" type="submit" class="btn btn-success btn-sm pull-right"  name="add"><i class="fas fa-save"></i> Save</button>
	
	<a href="clients.php" class="btn btn-sm btn-default pull-right">Cancel</a> 
	
	
</form>

<?php
	include("includes/footer.php");
?>