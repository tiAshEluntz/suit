<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$orders = $data['trasaction'];
$name = $data['name'];
//var_dump($order);

include 'app/views/EmployeeNavBar.php';



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
    
    
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Order Num</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Amount paid</th>
      <th scope="col">Time Created</th>
      <th scope="col">More info</th>



    </tr>
  </thead>
  <tbody>
    
<?php 


echo '<div class="shadow-none p-3 mb-5 bg-light rounded" style="text-align:center; margin_top:25px;">Transactions from '."$name". '</div>';
//var_dump($orders);
$counter = 1;
//echo '<ul class="list-group" style = "display: block; margin_top:1px;">' ;


foreach($orders as $order){
    echo '<tr>';
    echo '<td> '.$order->order_id.' </td>';
    echo '<td> '. "$order->first_name $order->last_name".' </td>';
    echo '<td> '.$order->payment_amount.' </td>';
    echo '<td> '.$order->createdtime.' </td>';
    echo '<td><a href = "/Employee/viewItemsInOrder/'."$order->transaction_id".'"> Items In Order</a> </td>';



//echo 'test';
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