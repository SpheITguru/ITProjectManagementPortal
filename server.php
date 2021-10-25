<?php 
  //connect to the database
$db = mysqli_connection('$_ENV["DB_HOST"]','$_ENV["DB_USER"]','$_ENV["DB_PASSWORD"]','projectdb');
  //if the register button is clicked
if(isset($_POST['submit'])){
  $fname = mysql_real_escape_string($_POST['firstname']);
  $lname = mysql_real_escape_string($_POST['lastname']);
  $email = mysql_real_escape_string($_POST['email']);
  $password = mysql_real_escape_string($_POST['$password']);
  $cpassword = mysql_real_escape_string($_POST['$cpassword']);
?>
