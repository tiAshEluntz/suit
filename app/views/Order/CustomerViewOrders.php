<?php

$orders = $data['orders'];

include 'app/views/CustomerNavBar.php';

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
    <link href="/app/css/bootstrap.min.css" rel="stylesheet">

    <!-- script
    ================================================== -->
    <script src="/app/views/js/modernizr.js"></script>
    <script src="/app/views/js/pace.min.js"></script>
        

</head>
<body>

    <div class='py-5 text-center'>
        <h2>Your Company's Orders</h2>
        <p class='lead'>A list of all of your company's orders.</p>
      </div>
    
    
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Status</th>
      <th scope="col">Location</th>
      <th scope="col">Pickup Date</th>
      <th scope="col">Delivery Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
<?php 
$counter = 1;

  foreach($orders as $order){
      echo '<tr>';
      echo '<td> '.$order->order_id.' </td>';
      echo '<td> '.$order->status.' </td>';
      echo '<td>'. $order->location.'</td>';
      echo '<td>'. $order->pickup.'</td>';
      echo '<td>'. $order->delivery.'</td>';
      echo '<td><a class="btn btn-primary" href="/Customer/RateService/' . $order->order_id . '">Rate</a></td>';
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