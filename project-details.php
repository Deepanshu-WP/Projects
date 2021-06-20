<?php 
session_start();
$id = $_GET['id']; 
include('config.php');
include('functions.php');
$uid = $_SESSION['id'];
$role = $_SESSION['role'];

$apid = check_assign($id);
if(empty($_SESSION['id'])) {
  header("Location: ".base_url()."");
}

if($uid != $apid && $role != 'Administrator') {
  header("Location: ".base_url()."");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

	
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="top-bar">
	<div class="container-fluid">
		<h4>Welcome <?php echo $_SESSION['name']; ?>!! <a href="logout.php" class="pull-right">logout</a></h4>
	</div>
	</div>
	<div class="container">
		<div class="web-logo">
			<a href="<?php echo base_url(); ?>"><img src="images/logo.png" alt="logo" /></a>
		</div>
		<?php 
		if($_SESSION["role"] == 'Administrator'){ ?>
		
		<nav class="navbar navbar-inverse QuickNav-top">
		
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  
			</div>
			<div id="navbar" class="collapse navbar-collapse">
			  <ul class="nav navbar-nav">
				<li><a href="<?php echo base_url(); ?>add-new-project.php">Add New Project</a></li>
				<li><a href="<?php echo base_url(); ?>add-new-task.php">Add New Task</a></li>
				<li><a href="<?php echo base_url(); ?>assign-project.php">Assign Project</a></li>
				
			  </ul>
			</div><!--/.nav-collapse -->
		 
		</nav>
		
		<?php } ?>
		
		
		<div class="project-wrapper">
			<?php 
				$sql = "SELECT * FROM tbl_project where id = $id";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
					 ?>
					 <div class="row">
						<div class="col-md-6">
							<div class="project-heading">
								<div class="project-image">
									<img src="<?php echo base_url(); ?><?php echo $row['project_image']; ?>" class="img-responsive"/>
								</div>
								<h1><?php echo $row['project_name']; ?> <span><?php echo get_project_status($row['project_status']); ?></span></h1>
								<h4><strong>Duration:</strong> <?php echo $row['project_duration']; ?></h4>
								<h5><strong>Start Date:</strong> <?php echo date('M j, Y', strtotime($row['project_start'])); ?></h5>
								<h5><strong>End Date:</strong> <?php echo date('M j, Y', strtotime($row['project_end'])); ?></h5>
							</div>
						</div>
						
						
						<div class="col-md-6">
							<div class="project-heading">
								<h3>Description:</h3>
								<?php echo $row['project_description']; ?>
							</div>
						</div>	
					 </div>
					 <?php 
					//print_r($row);	
					  
				  }
				}
			?>
		</div>
		
		<div class="tasks">
			<div class="task-heading"><h2>Task</h2></div>
			<table id="myTable" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Project ID</th>
						<th>Project Name</th>
						<th>Task Name</th>
						<th>Task Start</th>
						<th>Task End</th>
						<th>Status</th>
						<th>View</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Project ID</th>
						<th>Project Name</th>
						<th>Task Name</th>
						<th>Task Start</th>
						<th>Task End</th>
						<th>Status</th>
						<th>View</th>
						<th>Edit</th>
					</tr>
				</tfoot>
			</table>
		</div>
		
		
		
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>


	
	<script>
			$(document).ready( function () {
   
				$('#myTable').DataTable( {
					"ajax": "php/task-data.php?id=<?php echo  $id; ?>"
				} );
			} );
	</script>
  </body>
</html>