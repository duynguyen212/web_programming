<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Client Address Book - Home Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

	<link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet"> <!--load all styles -->
</head>
<body>
	<nav class="navbar navbar-default navbar-inverse" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="clients.php"><i class="far fa-address-book"></i> Client Manager </a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<?php
					if($_SESSION['loggedInUser'])
					{
						// if user is logged in					
				?>
				<ul class="nav navbar-nav">
					<li class="active"><a href="clients.php">Clients</a></li>
					<li><a href="add.php">Add Client</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text">Welcome, <?php echo $_SESSION['loggedInUser']; ?></p>
					<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>					
				</ul>
				<?php
					}
					else
					{
				?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>					
				</ul>
				<?php
					}
				?>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<div class="container">
