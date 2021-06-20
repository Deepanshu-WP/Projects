<?php 
include('../config.php');
include('../functions.php');
date_default_timezone_set('Asia/Kolkata');
$user_fullname = addslashes($_POST['user_fullname']);
$user_email = addslashes($_POST['user_email']);
$user_name = strstr($_POST['user_email'], '@', true);
$user_password = $_POST['user_password'];
$user_created = date('Y-m-d h:i:s');
$user_pin = rand(1000,9999);


	$sql1 = "SELECT user_email from tbl_user where user_email = '$user_email'";
	$result1 = $conn->query($sql1);

	if ($result1->num_rows > 0) {
		
	header("Location: ".base_url()."signup.php?msg=error");	
		
	}else{

$sql = "INSERT INTO tbl_user (user_email, user_fullname, user_name, user_password, user_created, user_status, user_pin, user_role)
VALUES ('$user_email', '$user_fullname', '$user_name', '$user_password', '$user_created', '0', '$user_pin', 'Subscriber')";

if ($conn->query($sql) === TRUE) {
  
  
	$to = $user_email;
	$subject = "Signup - Project Management";

	$message = "
	<html>
	<head>
	<title>Signup - Project Management</title>
	</head>
	<body>
	<p>Signup details - Project Management</p>
	<table>
	<tr>
	<td>Full Name</td>
	<td>".$user_fullname."</td>
	</tr>
	<tr>
	<td>Email</td>
	<td>".$user_fullname."</td>
	</tr>
	<tr>
	<td>Username</td>
	<td>".$user_name."</td>
	</tr>
	<tr>
	<td>Password</td>
	<td>".$user_password."</td>
	</tr>
	</table>
	</body>
	</html>
	<h3>Activate Account <a href='".base_url()."activate.php?email=".$user_email."&pin=".$user_pin."'>Click Here</a></h3>
	";
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// More headers
	$headers .= 'From: <webmaster@bagrusaree.com>' . "\r\n";
	mail($to,$subject,$message,$headers);
    header("Location: ".base_url()."?msg=1");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


	}

$conn->close();
?>