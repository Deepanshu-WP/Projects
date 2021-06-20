<?php 
include('../config.php');
include('../functions.php');
date_default_timezone_set('Asia/Kolkata');

$project_name = addslashes($_POST['project_name']);
$project_duration = addslashes($_POST['project_duration']);
$project_start = date('Y-m-d h:i:s',strtotime($_POST['project_start']));
$project_end = date('Y-m-d h:i:s',strtotime($_POST['project_end']));
$project_description = addslashes($_POST['project_description']);
$project_status = $_POST['project_status'];
$id = $_GET['id'];
	

	

if(isset($_GET['action']) && $_GET['action'] == 'edit'){


	if (file_exists($_FILES['project_image']['tmp_name']) || is_uploaded_file($_FILES['project_image']['tmp_name'])) {
	$target_dir = "../images/";
	$target_file = $target_dir . time().'.jpg';
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	echo $project_image = 'images/'.time().'.'.$imageFileType;
	
	// Check if image file is a actual image or fake image

	//$check = getimagesize($_FILES["project_image"]["tmp_name"]);
 
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["project_image"]["tmp_name"], $target_file)) {
		//echo "The file ". htmlspecialchars( basename( $_FILES["project_image"]["name"])). " has been uploaded.";
	  } else {
		//echo "Sorry, there was an error uploading your file.";
	  }
	}
	
	}else{
	$project_image = $_POST['if_blank'];
	}
	
	
	$sql = "UPDATE tbl_project SET project_name='$project_name', project_image='$project_image', project_duration='$project_duration', project_start='$project_start', project_end='$project_end', project_status='$project_status', project_description='$project_description' WHERE id='$id'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: ".base_url()."?msg=1");
	} else {
	  header("Location: ".base_url()."?msg=0");
	}	

}else{
	$target_dir = "../images/";
	$target_file = $target_dir . time().'.jpg';
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	$project_image = 'images/'.time().'.'.$imageFileType;
	
	// Check if image file is a actual image or fake image

	$check = getimagesize($_FILES["project_image"]["tmp_name"]);
 
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["project_image"]["tmp_name"], $target_file)) {
		//echo "The file ". htmlspecialchars( basename( $_FILES["project_image"]["name"])). " has been uploaded.";
	  } else {
		//echo "Sorry, there was an error uploading your file.";
	  }
	}
	

$sql = "INSERT INTO tbl_project (project_name, project_image, project_duration, project_start, project_end, project_status, project_description)
VALUES ('$project_name', '$project_image', '$project_duration', '$project_start', '$project_end', '1', '$project_description')";

if ($conn->query($sql) === TRUE) {
	header("Location: ".base_url()."?msg=1");
}

}

?>