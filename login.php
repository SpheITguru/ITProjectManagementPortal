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
    if (isset($_POST['submit'])){       

    $select = mysqli_query($con," SELECT * FROM users WHERE email = '$email' AND pass = '$pass' ");
    $row  = mysqli_fetch_array($select);
    echo '$select';
        
    $_SESSION["email"] = $_POST['email'];
    $_SESSION["pass"] = $_POST['password'];
    $pass=md5($_SESSION["pass"]);
        
    if(is_array($row)) {
        $_SESSION["email"] = $row['email'];
        $_SESSION["pass"] = $row['pass'];
    }   else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Email or Password!");';
        echo 'window.location.href = "login.php" ';
        echo '</script>';
    }
    }
    if(isset($_SESSION["email"])){
        header("Location:dashboard.php");
    }
?>
</body>
</html>
