<?php
    require_once 'php_action/core.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Stock Management System</title>
    
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- bootstrap theme -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <!-- custom CSS  -->
    <link rel="stylesheet" href="custom/css/custom.css">
    <!-- jQuery Script Library -->
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <!-- jQuery UI Library -->
    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
    <script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
    <!-- Data tables -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
    <!-- File Input -->
    <link rel="stylesheet" href="assets/plugins/fileinput/css/fileinput.min.css">
    <!-- bootstrap JS Library -->
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin Board</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li id="navDashboard"><a href="dashboard.php"><i class="glyphicon glyphicon-list-alt"></i> Dashboard </a></li>
                    <li id="navBrand"><a href="brands.php"><i class="glyphicon glyphicon-btc"></i> Brand </a></li>
                    <li id="navCategories"><a href="category.php"><i class="glyphicon glyphicon-th-list"></i> Category </a></li>
                    <li id="navProduct"><a href="product.php"><i class="glyphicon glyphicon-ruble"></i> Product </a></li>
                    <li class="dropdown" id="navOrder">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="topNavNewOrder"><a href="order.php?o=new"><i class="glyphicon glyphicon-plus"></i> New Order</a></li>
                            <li id="topNavManageOrder"><a href="order.php?o=manord"><i class="glyphicon glyphicon-edit"></i> Manage Order</a></li>
                            
                        </ul>
                    </li>
                    <li id="navReport"><a href="report.php"><i class="glyphicon glyphicon-check"></i> Report</a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" id="navSetting">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Hi, <?php echo $_SESSION['userName'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="topNavSetting"><a href="setting.php"><i class="glyphicon glyphicon-wrench"></i> Setting</a></li>
                            <li id="topNavLogOut"><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- END OF NAVBAR -->
    <div class="container">