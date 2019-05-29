<?php
  include 'app/views/navBarNotLogged.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>SuitGarcon</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
  <!--GOOD BOOTSTRAP LINK HERE LINE 13,14 AND BEFORE THE </body> TAG-->
        <link href="/app/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/app/css/font-awesome/css/fontawesome.min.css">
    <!-- script
    ================================================== -->
    <script src="/app/views/js/modernizr.js"></script>
    <script src="/app/views/js/pace.min.js"></script>
</head>
<body>
	<div class='py-5 text-center'>
        <h2>Register Customer</h2>
        <p class='lead'>You may create a new customer account.</p>
      </div>	
								
	<form id="register-form" action="" method="post" role="form" style="display: block; width: 50%; margin: auto; margin-top: 10px; text-align: center">


		<div class="form-group">
			<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" >
		</div>

		<div class="form-group">
			<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name">
		</div>
		<div class="form-group">
			<input type="text" name="last_name" id="last_name" tabindex="1" class="form-control" placeholder="Last Name" >
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" >
		</div>
		<div class="form-group">
			<input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" >
		</div>
		<div class="form-group">
			<input type="text" name="company_key" id="company_id" tabindex="2" class="form-control" placeholder="Company key">
		</div>


            <p style="color: red; text-align: center;"><?php if(isset($data['message'])){echo($data['message']);}?></p>

		<input type="submit" name="registercustomer_submit" id="registercustomer-submit" tabindex="4" class="form-control btn btn-primary" value="Register">
	</form>
<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script> 
</body>
</html>



