<?php

session_start();
include "db_conn.php";
require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Porject Portal</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <form method="POST" action="login.php">
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit">
        <div class="switch">
            <span>Don't you have an account? <a href="signup.php">Create Account</a></span>
        </div>
    </form>
    
<?php
    if (isset($_POST['emailt'])){       
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
        
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass' ";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $row  = mysqli_num_rows($result);
        
    if($rows==1){
        $_SESSION['email'] = $email;
        header("Location:dashboard.php");
        exit();
    }
    else{
        $message="Error email or password";
        echo "<script type='text/javascript'>alert('$message');</script>";
        }
    
    }
?>
</body>
</html>
