
<?php
  include 'app/views/EmployeeNavBar.php';
?>
<!DOCTYPE html>
<head>
    <title>SuitGarcon...Company</title>

    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>
   
     <!--GOOD BOOTSTRAP LINK HERE LINE 13,14 AND BEFORE THE </body> TAG-->
    <link href='/app/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='/app/css/font-awesome/css/fontawesome.min.css'>

    <!-- CSS
	================================================== -->
	<link href='/app/css/bootstrap.min.css' rel='stylesheet'>

	<!-- script
	================================================== -->
	<script src='/app/views/js/modernizr.js'></script>
	<script src='/app/views/js/pace.min.js'></script>
</head>
<body>




<?php

echo"<div class='pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center'>
<h2 class='display-4'>All Orders</h2>
</div>
<table class='table'>
<tr><th>Order ID</th><th>Company ID</th><th>Employee ID</th><th>Status</th><th>Location</th><th>Pickup</th><th>Delivery</th></tr>
<form method='post' action=''>
";


foreach ($data['orders'] as $orders) {
echo"
<tr>
	<td>$orders->order_id</td>
	<td>$orders->company_id</td>
	<td>$orders->employee_id</td>
	<td>$orders->status</td>
	<td>$orders->location</td>
	<td>$orders->pickup</td>
	<td>$orders->delivery</td>
</tr>";

}

echo"</form></table>";

?>

<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
