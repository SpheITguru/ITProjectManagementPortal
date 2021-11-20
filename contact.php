<?php
  if (isset($_POST["submit"])) {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["subject"];
    $message = $_POST["message"];

    $to = "sphe.mlu@gmail.com";
    $subject = $message;

    $message = "Name: {$username} Email: {$email} Subject: {$phone}  Message: " . $message;

    // Always set content-type when sending HTML email
    //$headers = "MIME-Version: 1.0" . "\r\n";
    //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: IT Portal';

    $mail = mail($to,$subject,$message,$headers);

    if ($mail) {
      echo "<script>alert('Mail Send.');</script>";
    }else {
      echo "<script>alert('Mail Not Send.');</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>IT Project Portal</title>
    <link rel="stylesheet" href="css/contact.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
</head>
<body>
    <header>
        <a href="#" class="logo">IT Portal</a>
        <ul class="navigation">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            
            <li><a href="#">Dashboard</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <ul class="login">
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign up</a></li>
        </ul>
    </header>
    

    <div class="container-contact">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Email us with any questions or inquiries. We would be happy
            to answer your questions and set up a meeting you you.
          </p>

          <div class="info">
            <div class="information">
              <img src="images/img/location.png" class="icon" alt="" />
              <p>185 Steve Biko Road, Durban 4000</p>
            </div>
            <div class="information">
              <img src="images/img/email.png" class="icon" alt="" />
              <p>info@itproject.com</p>
            </div>
            <div class="information">
              <img src="images/img/phone.png" class="icon" alt="" />
              <p>123-456-789</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="" method="post" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="text" name="subject" class="input" />
              <label for="">Subject</label>
              <span>Subject</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" name="submit" value="Send" class="btn" />
          </form>
        </div>
      </div>
    </div>

    <script src="js/contact.js"></script>


    <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>company</h4>
  	 			<ul>
  	 				<li><a href="#">about us</a></li>
  	 				<li><a href="#">testimonials</a></li>
  	 				<li><a href="#">privacy policy</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">Weekly Updates</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Our History</h4>
  	 			<ul>
  	 				<li><a href="#">Projects</a></li>
  	 				<li><a href="#">Top 10 students</a></li>
  	 				<li><a href="#">Best sponsors</a></li>
  	 				<li><a href="#">About the Lecture</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fab fa-twitter"></i></a>
  	 				<a href="#"><i class="fab fa-instagram"></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>
    
</body>
</html>
