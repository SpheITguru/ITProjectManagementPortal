i<?php

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
    if (isset($_POST['email'])){       

    $select = mysqli_query($con," SELECT count(*) as total FROM users WHERE email = '".$email."' AND pass = '".$pass."' ") or die(mysqli_error($con));
    $row  = mysqli_fetch_array($select);
        
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass=md5($_SESSION["pass"]);
        
    if($row['total'] > 0) {
        echo "<script>alert('email and password are correct')</script>";        
        } 
        else{
        echo "<script>alert('email and password are incorrect')</script>";  
        }
    } 
?>
</body>
</html>
