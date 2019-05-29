<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$orders = $data['order'];
$username = $data['username'];
//var_dump($order);

include 'app/views/navbar.php';



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
        <h2><?php echo "$username" ?>'s Orders</h2>
        <p class="lead">You may now view all of <?php echo "$username" ?>'s transactions.</p>
      </div>
    
    
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Order Num</th>
      <th scope="col">Location</th>
      <th scope="col">Order Date</th>
      <th scope="col">Status</th>
      <th scope="col">Pickup Date</th>
      <th scope="col">Delivery Date</th>


    </tr>
  </thead>
  <tbody>
    
<?php 

$counter = 1;

  foreach($orders as $order){
      echo '<tr>';
      echo '<td> '.$order->order_id.' </td>';
      echo '<td> '. $order->location.' </td>';
      echo '<td> '.$order->order_date.' </td>';
      echo '<td> '."$order->status".'</td>';  
      echo '<td> <a>'. $order->pickup.' </a></td>';
      echo '<td> <a>'. $order->delivery.' </a></td>';
      $counter++;
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