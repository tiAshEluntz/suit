<?php
include 'app/views/CustomerNavBar.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        

</head>
   
<body>
    
 <?php 
 if(isset($data['info'])){
     echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Don\'t worry!</h4>
  <p>Your ticket was sent successfully.</p>
  <hr>
  <p class="mb-0">Please Give Time to our employee to answer you. You will be notified</p>
</div>';
     
     
 }
 
 
 ?>
   
    
<div class="py-5 text-center">
        <h2>Send Ticket</h2>
        <p class="lead">You may send a ticket to our customer support and they will reply shortly</p>
      </div>
        
   <form style="display: block; width: 50%; margin: auto; margin-top: 10px; text-align: center" action="/Customer/submitTicket" method="POST">

       
        <div class="form-group">
    <label for="subject">Subject</label>
    <textarea name="subject" id="subject" class="form-control" id="subject" placeholder="Help me!!! I am really lost with the logout button" rows="3"></textarea>
  </div>
    
    <button type="submit" name="submitButton" id ="submitButton" class="btn btn-primary">Submit</button>
    <button type="reset" onclick="document.location.href = '/Customer/CompanyOrders'" class="btn btn-danger">Cancel</button>
</form>



        
<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
