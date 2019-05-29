<?php


if(isset($_SESSION['type']) && $_SESSION['type'] === "Company")
include 'app/views/navbar.php';

if(isset($_SESSION['type']) && $_SESSION['type'] === "Admin")
include 'app/views/AdminNavBar.php'; 

if(isset($_SESSION['type']) && $_SESSION['type'] === "Employee")
include 'app/views/EmployeeNavBar.php'; 

if(isset($_SESSION['type']) && $_SESSION['type'] === "Customer")
include 'app/views/CustomerNavBar.php'; 

/* To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$hiddenError = $data['hiddenError'];
$hiddenErrorBox = $data['hiddenErrorBox'];
$username = 'Not logged in';

if($_SESSION != null & isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Delete Account</title>

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
        <h2>Delete Account</h2>
        <p class="lead">You may now fully delete your account.</p>
      </div>

  <div class="alert alert-danger alert-dismissible fade show" role="alert" <?php echo $hiddenErrorBox ?> >
    <strong>Error</strong> Wrong password.. are you having second thoughts??
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <br>
  <div class="alert alert-success" role="alert" <?php echo $hiddenError ?>>
    <h4 class="alert-heading">Well done!</h4>
    <p>You have unsubscribe successfully... You are no longer part of the team. You can now reload the page to go to the main menu as you are disconnected from the account.</p>
    <hr>
    <p class="mb-0">If you want to be part again, you know what to do</p>
  </div>
    
    <form style="display: block; width: 50%; margin: auto; text-align: center" action="/Company/unsubscribe" method="POST">
      <div class="form-group" >
      <label for="currentPassword">Current Password</label>
      <input type="password" class="form-control" id="currentPassword" name="currentPassword" aria-describedby="passHelp">
      <small id="passHelp" class="form-text text-muted">Please enter your current password to verify your identity</small>
      </div>

      <button style="float:right;" type="reset" id="cancel" class="btn btn-info" onClick="document.location.href = '/Home/Index'">Cancel</button>

      <button style="float:right; margin-right: 5px" type="submit" name="saveButton_submit" id="saveButton" class="btn btn-danger" aria-describedby="clickHelp">Delete Account</button>
      <br><br>
      <small id="clickHelp" class="form-text text-muted" style="color: red; text-align: center;">WARNING!! once you click unsubscribe, there is no going back, you will lose your account. <br>We take into account that by entering your <br>password, you are confirming your account deletion.</small>

    </form>
          
</body>
</html>