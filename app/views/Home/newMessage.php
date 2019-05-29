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
     
    
<div class="py-5 text-center">
        <h2>Inbox</h2>
        <p class="lead">Here are your new messages.</p>
      </div>
        
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subject</th>
      <th scope="col">Answer</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
    //$messages = (object) $messages;
   // foreach ($messages as $message) {
        
    
       
    $flag = false;
    for($i=0; $i < 100; $i++){
        if(isset($_SESSION['message'."$i"])){
        echo '<tr>';
        echo '<th scope="row">'.$_SESSION['theId'.$i].'</th>';
        echo '<td>'.$_SESSION['subject'."$i"].'</td>';
        echo '<td>'.$_SESSION['message'."$i"].'</td>';

    echo '
            <form action="/Customer/test/'.$i."/".$_SESSION['theId'.$i].'">
            <td><button type="submit" class="btn btn-primary">
  Got it <span class="badge badge-light">!</span>
</button></td>
</form>
';

        echo '</tr>';
        }
               
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
