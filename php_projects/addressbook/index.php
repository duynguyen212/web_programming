<?php
	session_start();

	if(isset($_POST['login']))
	{
		include("includes/functions.php");
		// connect to DB
		include("includes/connection.php");

		$formUser = validateFormData($_POST['username']);
		$formPassword = validateFormData($_POST['password']);

		$queryStr = "SELECT * FROM users WHERE username='$formUser'";

		$result = mysqli_query($conn, $queryStr);

		// if there is data
		if(mysqli_num_rows($result) > 0)
		{
			// store the basic data in variables 
			while ($row = mysqli_fetch_assoc($result)) 
			{
				$user = $row['username'];
				$hasedPassword = $row['password'];
				$email = $row['email'];
			}

			// check password
			if(password_verify($formPassword, $hasedPassword))
			{
				// correct login details, start the session
				session_start();

				// store the data in SESSION variable
				$_SESSION['loggedInUser'] = $user;
				$_SESSION['loggedInEmail'] = $email;
				header("Location: clients.php");
			}
			else
			{
				// hashed password didn't veriry
				$loginError = "<div class='alert alert-danger'> Wrong username/password combination. 
								Please try again. <a class='close' data-dismiss='alert'>&times;</a></div>";
			}
		}
		else
		{
			// no users in DB
			$loginError = "<div class='alert alert-danger'>No users in our system. Please try again. <a class='close' data-dismiss='alert'>&times;</a></div>";
		}

	}

	//close the connection
	mysqli_close($conn);

	include("includes/header.php");
?>

<div class="container">
	<div class="row">
		<h1>Client Address Book</h1>	
		<h3 class="text-info">Log in to your account</h3>
		<br>
		<?php echo $loginError; ?>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-inline">
			<div class="form-group">
				<label for="username" class="sr-only">Username</label>
				<input type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
				<label for="password" class="sr-only">Password</label>
				<input type="password" class="form-control" name="password">
			</div>
			<input type="submit" class="btn btn-success" value="Login" name="login">
		</form>
	</div>
</div>

<?php
	include("includes/footer.php");
?>