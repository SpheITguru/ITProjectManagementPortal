<?php

$host = $_ENV["DB_HOST"];
$username = $_ENV["DB_USER"];
$password = $_ENV["DB_PASSWORD"];

$db_name = "projectdb";

$con = new mysqli($host, $username, $password,$db_name);

if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
  }
  echo "Connected successfully";
?>
