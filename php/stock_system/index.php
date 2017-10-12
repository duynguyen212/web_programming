<?php
    require_once 'php_action/db_connect.php';

    // create a session
    session_start();

    // initialize an array of error messages
    $errors = array();

    if ($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (empty($username) || empty ($password)) {
            $errors[] = "Username is required! Please enter your username";
        }
        
        if ($password === "") {
            $errors[] = "Password is required! ";
        } else {
            $sqlStr = "SELECT * FROM users WHERE username= '$username'";
            $result = $connect->query($sqlStr); 
            
            if ($result->num_rows == 1) {
                $password = md5($password);
                
                // record exists
                $mainSqlStr = "SELECT * FROM users WHERE username ='$username' AND password = '$password'";
                $mainResult = $connect->query($mainSqlStr);
                
                if ($mainResult->num_rows == 1) {
                    $value = $mainResult->fetch_assoc();
                    $user_id = $value['user_id'];
                    $user_name = $value['username'];
                    
                    //set session
                    $_SESSION['userID'] = $user_id;
                    $_SESSION['userName'] = $user_name;
                                        
                    header('location: http://duynguyen.dev/stock_system/dashboard.php');
                } else {
                    $errors[] = "Username/Password is incorrect";
                }
            }
            else {
               $errors[] = "Username does not exist!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stock Management System</title>
    
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
    <!----- bootstrap JS Library ----->
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
   <!-- Container -->
    <div class="container">
        <div class="row vertical">
            <div class="col-md-5 col-md-offset-4">
                <!-- Panel -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In Form</h3>
                    </div>
                    <div class="panel-body">
                       <div class="message">
                           <?php
                                if ($errors) {
                                    foreach ($errors as $key => $value) {
                                        echo '<div class="alert alert-warning" role="alert">
                                                <i class = "glyphicon glyphicon-exclamation-sign"></i> ' . $value . '</div>';
                                    }
                                }
                           ?>
                       </div>
                       
                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" id="formLogin">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Your username" value="admin">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name = "password" placeholder="Password" value="adminpassword">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-log-in"></i> Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!--End of Panel-->
            </div> <!-- End of col-md-5 -->
        </div> <!-- End of Row -->
    </div>
    <!-- End of Container -->
    
</body>
</html>
