<?php
$host = $_ENV["DB_HOST"];
$username = $_ENV["DB_USER"];
$password = $_ENV["DB_PASSWORD"];
$db_name = "projectdb";

mysql_connect($host,$username,$password);
mysql_select_db($db_name);

if(isset($POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="select * from users where email='".$email."'AND pass='".$password."' limit 1";
    
    $result=mysql_query($sql);
    if(mysql_num_rows($result)==1){
        echo "You have Successfully logged in";
        exit();
    }
    else{
        echo " You have Entered Incorrect Password";
    }
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
    
    <form method="POST" action="#">
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit">
        <div class="switch">
            <span>Don't you have an account? <a href="signup.php">Create Account</a></span>
        </div>
    </form>
</body>
</html>
