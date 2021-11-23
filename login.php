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

            $select_idea = mysqli_query($con," SELECT * FROM ideas WHERE sponsor = '$email' ");
            $row_idea  = mysqli_fetch_array($select_idea);


            if(is_array($row)) {
                $_SESSION["email"] = $row['email'];
                $_SESSION["fname"] = $row['fname'];
                $_SESSION["lname"] = $row['lname'];        
                $_SESSION["role"] = $row['role'];
                $_SESSION["student"] = $row['ystudent'];
                $_SESSION["idea"] = $row_idea['new_idea'];
                $_SESSION["idea_info"] = $row_idea['idea_info'];
                if(isset($_SESSION["email"]) && $row['role']=="student"){
                    header("Location:student.php");
                }elseif(isset($_SESSION["email"]) && $row['role']=="sponsor"){
                    header("Location:sponsor.php");
                }elseif(isset($_SESSION["email"]) && $row['role']=="lecture"){
                    header("Location:lecture.php");
                }
            }   else {
                echo "Email or Password is incorrect, please try again";

                }
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
