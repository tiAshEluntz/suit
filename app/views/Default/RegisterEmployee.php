<?php 
  include 'app/views/AdminNavBar.php';

$user_type = 'employee';
$first_name;
$last_name;
$employee_type;

$username;
$hash_pass;
//account_status?

?>

<!DOCTYPE html>
<html>
<head>
	<title>SuitGarcon</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
	    <!-- CSS
    ================================================== -->
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
        <h2>Register Employee</h2>
        <p class='lead'>You may create a new employee account.</p>
      </div>

	<form id="register-form" action="/Default/RegisterEmployee" method="post" role="form" style="display: block; width: 50%; margin: auto; margin-top: 10px; text-align: center">
		
		<div class="form-group">
			<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name" value="jean">
		</div>
		<div class="form-group">
			<input type="text" name="last_name" id="last_name" tabindex="1" class="form-control" placeholder="Last Name" value="paul">
		</div>
		<div class="form-group">
			<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="jeanpaul123">
		</div>
		
		<div class="form-group">
			<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="Paul">
		</div>
		<div class="form-group">
			<input type="password" name="confirm_password" id="confirm_password" tabindex="2" class="form-control" placeholder="Confirm Password" value="Paul">
		</div>

		<div class="input-group">
		  <select name="type" id="type" class="custom-select" id="employee_select">
		    <option selected>Employee Type...</option>
		    <option value="Admin">Admin</option>
		    <option value="Delivery">Delivery Man</option>
		    <option value="IT">IT</option>
		  </select>
		</div>

		<br>
		<input type="submit" name="registeremployee-submit" id="registeremployee-submit" class="btn btn-primary" value="Register">

	</form>

<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>   
</body>
</html>



