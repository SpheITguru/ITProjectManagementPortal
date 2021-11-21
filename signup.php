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
    
    <form action = "signup.php" method = "POST">
        <h1>Sign Up</h1>
        <?php

            require_once('connection.php');

            if(isset($_POST['submit']))
            {
                $fname = mysqli_real_escape_string($con, $_POST['firstname']);
                $lname = mysqli_real_escape_string($con, $_POST['lastname']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
                $role = mysqli_real_escape_string($con, $_POST['role']);

                if($password!=$cpassword)
                {
                    echo 'Password Not Matching';
                }else 
                {
                    $pass=md5($password);
                    $sql = "insert into users (fname,lname,email,pass,role) values ('$fname', '$lname', '$email', '$pass', '$role')";
                    $result = mysqli_query($con, $sql);
                    
                    if($result)
                    {
                        echo 'Your Record has been saved in the Database';
                    }
                    else 
                    {
                        echo 'Check your inputs';
                    }
                }
        }

?>
        <input type="text" name="firstname" placeholder="Firstname" required>
        <input type="text" name="lastname" placeholder="Lastname" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="cpassword" placeholder="Confirm Password" required>
        <div>
            <input type="radio" value="student" name="role"><label for="student">Student</label>
            <input type="radio" value="lecture" name="role"><label for="lecture">Lecture</label>
            <input type="radio" value="sponsor" name="role"><label for="sponsor">Sponsor</label>
        </div>
        <input type="submit" name="submit">
        <div class="switch">
            <span>Do you have an account? <a href="login.php">Login</a></span>
        </div>
    </form>
</body>
</html>
