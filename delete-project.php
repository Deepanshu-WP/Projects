<?php 
include('config.php');
include('functions.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
$sql = "DELETE FROM tbl_project WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  header("Location: ".base_url()."dashboard.php");
}

}