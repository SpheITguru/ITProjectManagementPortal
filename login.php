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
    if (isset($_POST['email'])){       
    $email = $_POST['email'];
    $pass = $_POST['password'];
        
    if ($email == "" || $pass == "")
    {
        $error = "Not all fields were entered<br />";
    }
    else
    {
    $query = "SELECT email, pass FROM users WHERE email=$email AND pass=$pass";
    if(mysqli_num_rows(queryMysql($query)) == 0)
    {
        $error = "<span class = 'error'> email/ password invalid</span><br /><br />";
            }
    }
    else{
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $pass;
    die(header("Location:dashboard.php"));
    }
     
    }
?>
</body>
</html>
