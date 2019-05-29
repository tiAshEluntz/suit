<?php

$transactions = $data['transactions'];

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

    <div class="py-5 text-center">
        <h2>Your Transactions</h2>
        <p class="lead">A list of all your transactions.</p>
      </div>
    
    <form style="display: block; width: 50%; margin: auto; margin-bottom: 40px; text-align: center" action="/Order/Transaction">
      <button type="submit" class="btn btn-primary">Get a Dry Clean</button>
    </form>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Company Order #</th> 
      <th scope="col">Order Date</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    
<?php 

  foreach($transactions as $transaction){
      echo '<tr>';
      echo '<td> '.$transaction->order_id.' </td>';
      echo '<td>'. $transaction->order_date.'</td>';
      echo '<td><a class="btn btn-primary" href="/Customer/Items/' . $transaction->transaction_id . '">View</a> <a class="btn btn-danger" href="/Customer/DeleteTransaction/' . $transaction->transaction_id . '">Delete</a></td>';
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