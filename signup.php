
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
        <input type="text" name="firstname" placeholder="Firstname">
        <input type="text" name="lastname" placeholder="Lastname">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="cpassword" placeholder="Confirm Password">
        <div>
            <input type="radio" id="student" name="role"><label for="student">Student</label>
            <input type="radio" id="lecture" name="role"><label for="lecture">Lecture</label>
            <input type="radio" id="sponsor" name="role"><label for="sponsor">Sponsor</label>
        </div>
        <input type="submit" name="submit">
        <div class="switch">
            <span>Do you have an account? <a href="login.php">Login</a></span>
        </div>
    </form>
</body>
</html>
