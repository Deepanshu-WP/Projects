<?php 
function base_url(){
return 'https://project.bagrusaree.com/';
}

function get_project_name($id){
				global $conn;
				$sql = "SELECT project_name FROM tbl_project where id = $id";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
					 return $row['project_name']; 
				  }
				  
				}
}

function get_developer_name($id){
				global $conn;
				$sql = "SELECT user_fullname FROM tbl_user where id = $id";
				$result = $conn->query($sql);

				if (@$result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
					 return $row['user_fullname']; 
				  }
				  
				}
}


function check_assign($id){
				global $conn;
				$sql = "SELECT project_assign FROM tbl_project where id = '$id'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				 while($row = $result->fetch_assoc()) {
					 return $row['project_assign'];
				 }
				 
				  
				}
}



function get_project_status($id){
				global $conn;
				$sql = "SELECT project_status FROM tbl_project_status where id = $id";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
					 return $row['project_status']; 
				  }
				  
				}
}