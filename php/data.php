<?php 
session_start();
include('../config.php');
include('../functions.php');
$id = $_SESSION['id'];
$role = $_SESSION['role'];
if($role == 'Administrator'){
$sql = "SELECT * FROM tbl_project";	
}else{
$sql = "SELECT * FROM tbl_project where project_assign = '$id'";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $array['data'][] = array(
     $row['id'],
	 '<img src="'.base_url().$row['project_image'].'"/>',
	 $row['project_name'],
	 $row['project_duration'],
	 date('M j, Y', strtotime($row['project_start'])),
	 date('M j, Y', strtotime($row['project_end'])),
	 get_developer_name($row['project_assign']),
	 get_project_status($row['project_status']),
	 '<a href="project-details.php?id='.$row['id'].'">Details</a>',
	 '<a href="edit-project.php?id='.$row['id'].'">Edit</a>',		 	 '<a href="delete-project.php?id='.$row['id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a>',	
   );
  }
} else {
  echo "0 results";
}
echo json_encode($array);
$conn->close();
?>