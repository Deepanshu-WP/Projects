<?php 
include('config.php');
include('functions.php');
if(isset($_POST['password']) && isset($_GET['email'])  && isset($_GET['pin'])){
		
	$password = $_POST['password'];	
	$email = $_GET['email'];
	$pin = $_GET['pin'];
	
	$sql = "UPDATE tbl_user SET user_password='$password' WHERE user_email='$email' && user_pin = '$pin'";
	if ($conn->query($sql) === TRUE) {
	  header("Location: ".base_url()."create-password.php?msg=true");
	}
	
}
?>
<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Forgot Password - Project Management</title>



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

				<h3>Create Password</h3>
				<?php if(isset($_GET['msg'])){

					if($_GET['msg'] == 'true'){

						echo '<p style="color:green; text-align:center;">Password create successfully!!</p>';

						echo "<script>setTimeout(function(){ window.location = '".base_url()."'; }, 5000);</script>";

					}

				}
				
				
				
				
				?>
				<form action="<?php //echo $CurPageURL; ?>" method="post" id="signupForm">

					  <div class="form-group">

						<label for="exampleInputEmail1">New Password</label>

						<input name="password" type="text" class="form-control" id="exampleInputEmail1" placeholder="Create Password"  autocomplete="off" required>

					  </div>

					  <button type="submit" class="btn btn-default">Submit</button>	

				</form>

			</div>

		</div>

	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js"></script>

  </body>

</html>