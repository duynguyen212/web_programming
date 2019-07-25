<?php
	session_start();

	// check user is logged in
	if (!isset($_SESSION['loggedInUser']))
	{
		header("Location: index.php");
	}

	// connect to DB 
	include("includes/connection.php");

	$queryStr = "SELECT * FROM clients";

	$result = mysqli_query($conn, $queryStr);
	
	
	if(isset($_GET['alert']))
	{
		if($_GET['alert']=='success')			
		{
			// query string of adding
			$alertMessage = "<div class='alert alert-success'>New client added! <a class='close' data-dismiss='alert'>
							&times;	</a> </div>";
		}
		elseif ($_GET['alert'] == 'updatesuccess')
		{
			// query string of updating
			$alertMessage = "<div class='alert alert-success'>Client's info has been updated successfully!
							<a class='close' data-dismiss='alert'> &times;	</a> </div>";
		}
		else if ($_GET['alert'] == 'deleted')
		{
			// query string of deleting
			$alertMessage = "<div class='alert alert-success'>Client has been deleted successfully!
							<a class='close' data-dismiss='alert'> &times;	</a> </div>";
		}
	}

	//close the connection 
	mysqli_close($conn);

	include("includes/header.php");
?>

<h1>List of clients</h1>

<?php echo $alertMessage; ?>

<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Address</th>
		<th>Company</th>
		<th>Notes</th>
		<th>Edit</th>
	</tr>

	<?php
		if (mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_assoc($result))
			{
				// we have data, now displaying the result to table
				echo "<tr>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['phone'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
				echo "<td>" . $row['company'] . "</td>";
				echo "<td>" . $row['notes'] . "</td>";
				echo "<td class='text-center'><a class='btn btn-primary btn-sm' href='edit.php?id=" . $row['id'] ."'>
						<i class='fas fa-edit'></i></a></td>";
				echo "</tr>";	
			}
			
		}
		else
		{
			echo "<tr class='bg-warning text-center'><td colspan='7'>
					No records in our database
				</td></tr>";
		}
		//  close the connection
		mysqli_close($conn);
	?>
	
	<tr>
		<td colspan="7">
			<div class="text-center">
				<a href="add.php" class="btn btn-success btn-sm"><i class="fas fa-plus-square"></i> Add Client</a>
			</div>
		</td>
	</tr>
<!-- 
	<tr>
		<td>Johny Mickey</td>
		<td>john.m@aga.cv</td>
		<td>090246357</td>
		<td>123, abcd, EFG</td>
		<td>ABC DEF Group</td>
		<td>Important! </td>
		<td></td>
	</tr> -->
</table>
<?php
	include("includes/footer.php");
?>