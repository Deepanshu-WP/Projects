<?php
session_start();
include('config.php');
include('functions.php');
if($_SESSION["role"] != 'Administrator'){ 
header("Location: ".base_url()."dashboard.php");	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Assign Project -  - Task Management</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	
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
		<h2 style="text-align:center;">Assign Project</h2>
		<div class="form-wrappers">
			<form action="php/assign-project.php" method="post">
			  <div class="form-group">
				<label for="ProjectName">Select Project</label>
				<select class="form-control" name="id">
					<option>--Select Project--</option>
					<?php 
					
					$sql = "SELECT id, project_name FROM tbl_project where project_status != 'Finish'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
						?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['project_name']; ?></option>
						<?php 
					  }
					}
					
					?>
				</select>
			  </div>
			  <div class="form-group">
				<label for="ProjectName">Select Developer</label>
				<select class="form-control" name="project_assign">
					<option>--Select Developer--</option>
					<?php 
					
					$sql = "SELECT id, user_fullname FROM tbl_user where user_status = '1' && user_role = 'Subscriber'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
						?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['user_fullname']; ?></option>
						<?php 
					  }
					}
					
					?>
				</select>
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
  </body>
</html>
