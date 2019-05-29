<?php
  

if(isset($_SESSION['type']) && $_SESSION['type'] === "Company")
include 'app/views/navbar.php';

if(isset($_SESSION['type']) && $_SESSION['type'] === "Admin")
include 'app/views/AdminNavBar.php'; 

if(isset($_SESSION['type']) && $_SESSION['type'] === "Employee")
include 'app/views/EmployeeNavBar.php'; 

if(isset($_SESSION['type']) && $_SESSION['type'] === "Customer")
include 'app/views/CustomerNavBar.php'; /* 

/* 
 * 
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
  */
  $theUser = $data['user'];
  //$theCompany = $data['company'];
  $redirect = "/Home/accountInfo/";
  //'hiddenSuccess'=>'hidden', 'hiddenError' 
  $hiddenSuccess = $data['hiddenSuccess'];
  $hiddenError = $data['hiddenError'];
  $message = $data['message'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Settings</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
  <!--GOOD BOOTSTRAP LINK HERE LINE 13,14 AND BEFORE THE </body> TAG-->
  <link href="/app/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/app/css/font-awesome/css/fontawesome.min.css">

  <!-- CSS
  ================================================== -->
  <link href="/app/css/bootstrap.min.css" rel="stylesheet">

  <!-- script
  ================================================== -->
  <script src="/app/views/js/modernizr.js"></script>
  <script src="/app/views/js/pace.min.js"></script>
  <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
  <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    

</head>
<body style="background-color: white;">

  <div class="py-5 text-center">
        <h2>Edit Password</h2>
        <p class="lead">You may edit your password.</p>
      </div>

  <div class="alert alert-danger alert-dismissible fade show" role="alert" <?php echo $hiddenError ?> >
    <strong>Error</strong> <?php echo $message ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    
  <div class="alert alert-success alert-dismissible fade show" role="alert" <?php echo $hiddenSuccess ?>>
    <strong>Success</strong> <?php echo $message ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
    
    
  <form style="display: block; width: 50%; margin: auto; margin-top: 100px; text-align: center" action="/Home/changePassword" method="POST">
    <div class="form-group" >
      <label for="currentPassword">Current Password</label>
      <input type="password" class="form-control" id="currentPassword" name="currentPassword" aria-describedby="passHelp">
      <small id="passHelp" class="form-text text-muted">Please enter your current password to verify your identity</small>
    </div>

    <div class="form-group" >
      <label for="newPass">New Password</label>
      <input type="password" id="newPass" name="newPass" class="form-control" aria-describedby="newPassHelp"> 
      <small id="newPassHelp" class="form-text text-muted">Please enter your new password</small>
    </div>
      
    <div class="form-group">
      <label for="newPass">New Password Confirmation</label>
      <input type="password" id="newPassConf" name="newPassConf" class="form-control" aria-describedby="newPassConfHelp"> 
      <small id="newPassConfHelp" class="form-text text-muted">Please re-enter your new password, make sure they match</small>
    </div>

    <button style="float:right;" type="reset" id="cancel" class="btn btn-danger" onClick="document.location.href = '/Home/accountInfo'">Cancel</button>       
    <button style="float:right; margin-right: 5px" type="submit" name="saveButton_submit" id="saveButton" class="btn btn-dark" >Save</button>
  </form>
      
</body>
</html>