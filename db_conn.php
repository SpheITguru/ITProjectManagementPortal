<?php

$host = $_ENV["DB_HOST"];
$username = $_ENV["DB_USER"];
$password = $_ENV["DB_PASSWORD"];

$db_name = "projectdb";

$conn = new mysqli($host, $username, $password,$db_name);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
?>
