<?php 
include('config.php');
include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Signup - Project Management</title>

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
  <body class="no-head">
    <div class="noheader-wrapper">
		<div class="container">
			<div class="web-logo">
					<img src="images/logo.png" alt="logo" />
			</div>
			<br/>
			<div class="form-wrapper">
				<h3>Signup</h3>
				<?php if(isset($_GET['msg'])){
					if($_GET['msg'] == 'error'){
						echo '<p style="color:red; text-align:center;">User Already Register with this email ID!!</p>';
						echo "<script>setTimeout(function(){ window.location = '".base_url()."signup.php'; }, 5000);</script>";
					}
				}
				?>
				<form action="php/signup.php" method="post" id="signupForm">
					  <div class="form-group">
						<label for="exampleInputFullname">Full Name</label>
						<input type="text" class="form-control" id="exampleInputFullname" placeholder="Full Name"  autocomplete="off" name="user_fullname" required>
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Email Address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" name="user_email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off" required>
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="user_password" placeholder="Password"  autocomplete="off"  required>
					  </div>
					  <button type="submit" class="btn btn-default">Signup</button>	
				</form>
			</div>
			
			<div class="other-msg">
				Already a member? <a href="index.php">Login Here</a>
			</div>
			
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>