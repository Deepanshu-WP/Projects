<?php 
include('../config.php');
include('../functions.php');
date_default_timezone_set('Asia/Kolkata');

$project_id = $_POST['project_id'];
$task_name = addslashes($_POST['task_name']);
$task_start = date('Y-m-d h:i:s',strtotime($_POST['task_start']));
$task_end = date('Y-m-d h:i:s',strtotime($_POST['task_end']));
$task_description = addslashes($_POST['task_description']);
$task_status = $_POST['task_status'];
$id = $_GET['id'];

	

	

if(isset($_GET['action']) && $_GET['action'] == 'edit'){	
	$sql = "UPDATE tbl_task SET project_id='$project_id', task_name='$task_name', task_start='$task_start', task_end='$task_end', task_status = '$task_status', task_description='$task_description' WHERE task_id= '$id'";

	if ($conn->query($sql) === TRUE) {
	  header("Location: ".base_url()."project-details.php?id=".$project_id."&msg=success");
	} else {
	  header("Location: ".base_url()."project-details.php?id=".$project_id."&msg=error");
	}	
}else{
	$sql = "INSERT INTO tbl_task (project_id, task_name, task_start, task_end, task_description)
	VALUES ('$project_id', '$task_name', '$task_start', '$task_end', '$task_description')";

	if ($conn->query($sql) === TRUE) {
		header("Location: ".base_url()."project-details.php?id=".$project_id."");
	}

}

?>