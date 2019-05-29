<?php

$items = $data['items'];
$transaction_id = $data['transaction_id'];

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
        <h2>Items in Transaction #<?php echo $transaction_id?></h2>
        <p class='lead'>A list of all the items in this transaction.</p>
      </div>
    
    
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Item</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    
<?php 

  foreach($items as $item){
     $price = $this->model('Price')->getPriceById($item->price_id);
      echo '<tr>';
      echo '<td> '.$price->item_name.' </td>';
      echo '<td>'. $price->price.'$</td>';
      echo '<td>'. $item->status.'</td>';
      
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