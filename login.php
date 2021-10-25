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
    if(isset($_POST['submit'])){
    mysqli_select_db($db_name) or die("Unable to select database: " . mysqli_error());
    $query = "SELECT * FROM users";
    $result = mysqli_query($query);
    }
    if(!$result) die ("Database access failed: " . mysqli_error());
    $rows = mysqli_num_rows($result);
    for ($j = 0; $j < $rows; ++$j)
    {
        echo 'Name: ' . mysqli_result($result,$j,'fname')  . '<br />';
        echo 'Surname: ' . mysqli_result($result,$j,'lname')  . '<br />';
        echo 'email: ' . mysqli_result($result,$j,'email')  . '<br />';
    }
?>
</body>
</html>
