<?php 
include('../config.php');
include('../functions.php');
date_default_timezone_set('Asia/Kolkata');

$project_id = $_POST['id'];
$project_assign = $_POST['project_assign'];



	

	


	$sql = "UPDATE tbl_project SET project_assign='$project_assign' WHERE id= '$project_id'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: ".base_url()."dashboard.php?msg=success");
	} else {
	  header("Location: ".base_url()."dashboard.php?msg=error");
	}	


?>