<?php 
include('../config.php');
include('../functions.php');

if(isset($_POST['email'])){
	$email = $_POST['email'];
	$sql = "SELECT * FROM tbl_user where user_email = '$email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		$user_email = $row['user_email'];
		$user_pin = $row['user_pin'];
		
		$to = $email;
		$subject = "Forget Password - Project management";

		$message = "<h3>Forget Password? <a href='".base_url()."create-password.php?email=".$user_email."&pin=".$user_pin."'>Click Here to create new</a></h3>";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <ProjectManagement@bagrusaree.com>' . "\r\n";
		

		mail($to,$subject,$message,$headers);
		header("Location: ".base_url()."forgot-password.php?msg=true");	
	  }
	} else {
	  header("Location: ".base_url());	
	}
	$conn->close();
}