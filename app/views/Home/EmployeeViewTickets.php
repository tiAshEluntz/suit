<?php
include 'app/views/EmployeeNavBar.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$tickets = $data['tickets'];
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
  <h4 class="alert-heading">Congratulation!</h4>
  <p>Your answer was sent successfully.</p>
  <hr>
  <p class="mb-0">Thank you for helping the company</p>
</div>';
     
     
 }
 
 
 ?>
    
<div class="py-5 text-center">
        <h2>Tickets</h2>
        <p class="lead">All unanswered user tickets</p>
      </div>
        
<table class="table">
  <thead>
    <tr>
      <th scope="col">Customer #</th>
      <th scope="col">Subject</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
    
    foreach ($tickets as $ticket) {
        echo '<tr>';
        echo '<td>'."$ticket->customer_id".'</td>';
        echo '<td>'."$ticket->subject".'</td>';
        echo '<td><a class="btn btn-primary" href="/Employee/answerTicket/'."$ticket->ticket_id".'">'."Answer Ticket".'</a></td>';
        echo '</tr>';

    }
        
    
       
    ?>
    
     </tbody>
</table>
    
    
    
    
        
<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
