<?php

session_start();
//include "db_conn.php";
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
        
        <?php
    if (isset($_POST['submit'])){       

    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass=md5($password);
        
    $select = mysqli_query($con," SELECT * FROM users WHERE email = '$email' AND pass = '$pass' ");
    $row  = mysqli_fetch_array($select);
        
    }
   
?>
        
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submit">
        <div class="switch">
            <span>Don't you have an account? <a href="signup.php">Create Account</a></span>
        </div>
    </form>
    

</body>
</html>
