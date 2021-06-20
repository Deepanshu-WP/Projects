<?php 
include('../config.php');
include('../functions.php');
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_task where project_id = '$id'";
$result = $conn->query($sql);
$array = array();
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	
	if($row['task_status'] == 1){
	$tstatus = '<div class="green-dot"></div>';
	}else{
	$tstatus = '<div class="red-dot"></div>';
	}		
	  
   $array['data'][] = array(
     $row['task_id'],
	 $row['project_id'],
	 get_project_name($row['project_id']),
	 $row['task_name'],
	 date('M j, Y', strtotime($row['task_start'])),
	 date('M j, Y', strtotime($row['task_end'])),
	 $tstatus,
	 '<a href="task-details.php?id='.$row['task_id'].'">Details</a>',
	 '<a href="edit-task.php?id='.$row['task_id'].'">Edit</a>',	
   
   );
  }
} else {
  //echo "0 results";
}
echo json_encode($array);
$conn->close();
?>