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
    <title>Add New Project -  - Project Management</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/jquery-te-1.4.0.css">
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
		<h2 style="text-align:center;">Add New Project</h2>
		<div class="form-wrappers">
			<form action="php/add-new-project.php" method="post"  enctype="multipart/form-data">
			  <div class="form-group">
				<label for="ProjectName">Project Name</label>
				<input type="text" class="form-control" id="ProjectName" placeholder="Project Name" name="project_name" required>
			  </div>
			  <div class="form-group">
				<label for="ProjectDuration">Project Duration</label>
				<input type="text" class="form-control" id="ProjectDuration" placeholder="Project Duration" name="project_duration" required>
			  </div>
			  <div class="row">
				<div class="col-md-6">
				  <div class="form-group">
					<label for="ProjectStart">Project Start</label>
					<input type="date" class="form-control" id="ProjectStart" placeholder="Project Start" name="project_start" required>
				  </div>
				</div>
				<div class="col-md-6">	
				  <div class="form-group">
					<label for="ProjectEnd">Project End</label>
					<input type="date" class="form-control" id="ProjectEnd" placeholder="Project End" name="project_end" required>
				  </div>
				</div>
				</div>	
			  <div class="form-group">
				<label for="exampleInputFile">Project Image</label>
				<input accept="image/*" type='file' id="imgInp" name="project_image"/>
				<img id="blah" src="#" alt="your image" style="display:none;"/>
			  </div>
			  
			  <div class="form-group" id="editor">
				<label for="exampleInputFile">Project Description</label>
				<textarea name="project_description" class="jqte-test"></textarea>
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
	<script>
		$('.jqte-test').jqte();
		
		// settings of status
		var jqteStatus = true;
		$(".status").click(function()
		{
			jqteStatus = jqteStatus ? false : true;
			$('.jqte-test').jqte({"status" : jqteStatus})
		});
		
		imgInp.onchange = evt => {
		  const [file] = imgInp.files
		  if (file) {
			$('#blah').show();  
			blah.src = URL.createObjectURL(file)
		  }
		}
		
	</script>
  </body>
</html>
