<?php 
include('config.php');
include('functions.php');

if(isset($_GET['email']) && isset($_GET['pin'])){

$email = $_GET['email'];
$pin = $_GET['pin'];

$sql = "UPDATE tbl_user SET user_status='1' WHERE user_email='$email' && user_pin = '$pin'";
if ($conn->query($sql) === TRUE) {
  header("Location: ".base_url()."?activate=true");
}

}else{
header("Location: ".base_url());	
}
$conn->close(); 