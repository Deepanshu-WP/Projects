<?php 
session_start();
include('../config.php');
include('../functions.php');
date_default_timezone_set('Asia/Kolkata');

$user_email = addslashes($_POST['user_email']);
$user_password = $_POST['user_password'];




	$sql = "SELECT * from tbl_user where user_email = '$user_email' && user_password = '$user_password' && user_status = '1'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
			$_SESSION["name"] = $row['user_fullname'];	
			$_SESSION["id"] = $row['id'];	
			$_SESSION["role"] = $row['user_role'];	
			header("Location: ".base_url()."dashboard.php");	
		 }
		
	}else{

	header("Location: ".base_url()."?msg=error");	
	}

$conn->close();
?>