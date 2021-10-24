<?php

$host = $_ENV["DB_HOST"];
$username = $_ENV["DB_USER"];
$password = $_ENV["DB_PASSWORD"];

$db_name = "sigmadb";

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
?>
