<?php
session_start();

$host = $_ENV["DB_HOST"];
$username = $_ENV["DB_USER"];
$password = $_ENV["DB_PASSWORD"];

$db_name = "projectdb";

$conn =  mysqli_connect($host, $username, $password,$db_name);

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
    
    <form method="POST" action="dashboard.php">
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
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
    $select = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND pass='$pass'");
    $row = mysqli_fetch_array($select);
        
    if(is_array($row)){
        $_SESSION["email"] = $row ["email"];
        $_SESSION["password"] = $row ["pass"];
    }   else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalif email or password!")';
        echo 'windows.location.href = "index.php"';
        echo '</script>';
    }
    }
    if(isset($_SESSION["email"])){
        header("Location:login.php");
    }
?>
</body>
</html>
