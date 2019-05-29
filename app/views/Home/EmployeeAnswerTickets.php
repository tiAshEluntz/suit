<?php
include 'app/views/EmployeeNavBar.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$theTicket = $data['ticket'];
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

  <div class="py-5 text-center">
        <h2>Answer Tickets</h2>
        <p class="lead">You may write Your Message</p>
      </div>
   
    <table class="table" style="width: 50%; margin-left: 25%">
  <thead>
    <tr>
      <th scope="col">Customer #</th>
      <th scope="col">Subject</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
    
    
        echo '<tr>';
        echo '<td>'."$theTicket->customer_id".'</td>';
        echo '<td>'."$theTicket->subject".'</td>';
        echo '</tr>';
        ?>
    
     </tbody>
</table>

        
   <form style="display: block; width: 50%; margin: auto; margin-top: 10px; text-align: center" action="/Employee/postTicketAnswer/<?php echo $theTicket->ticket_id."/".$theTicket->customer_id ?>" method="POST">

       
        <div class="form-group">
    <label for="subject">Message</label>
    <textarea name="message" id="message" class="form-control" id="subject" placeholder="Hi there, I am happy to help you:)" rows="3"></textarea>
  </div>
    
    <button type="submit" name="submitButton" id ="submitButton" class="btn btn-primary">Submit</button>
    <button type="reset" onclick="document.location.href = '/Employee/EmployeeViewTickets'" class="btn btn-danger">Cancel</button>
</form>
        
<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
