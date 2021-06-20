<?php 
$servername = "localhost";
$username = "referje0_vyas";
$password = "sairam@123#";
$dbname = "referje0_bagrusareestaging";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
