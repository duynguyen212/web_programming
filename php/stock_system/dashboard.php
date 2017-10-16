<?php
    require_once 'php_action/core.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Stock Management System</title>
    
    <!----- bootstrap ----->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!----- bootstrap theme ----->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
    <!----- font-awesome ----->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <!----- custom CSS ----->
    <link rel="stylesheet" href="custom/css/custom.css">
    <!----- jQuery Script Library ----->
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <!----- jQuery UI Library ----->
    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css">
    <script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
    <!----- Data tables ----->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
    <!----- File Input ----->
    <link rel="stylesheet" href="assets/plugins/fileinput/css/fileinput.min.css">
    <!----- bootstrap JS Library ----->
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

    <?php
        require_once 'includes/header.php';
        require_once 'includes/footer.php';
    ?>
    
    <!-- Script for File Input -->
    <script type="text/javascript" src="assets/plugins/fileinput/js/fileinput.min.js"> </script>
    <script type="text/javascript" src="assets/plugins/fileinput/js/plugins/canvas-to-blob.min.js"> </script>
    <script type="text/javascript" src="assets/plugins/fileinput/js/plugins/purify.min.js"> </script>
    <script type="text/javascript" src="assets/plugins/fileinput/js/plugins/sortable.min.js"> </script>
    <!-- Script for Data Tables -->
    <script type="text/javascript" src="assets/plugins/datatables/datatables.min.js"> </script>
</body>
</html>