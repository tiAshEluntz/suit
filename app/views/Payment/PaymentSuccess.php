<?php
  include 'app/views/CustomerNavBar.php';
  $total = $data['total'];
  $items = $data['items'];
  $prices = $data['prices'];
  $billing = $data['billing'];
  $customer = $data['customer'];
?>

<!DOCTYPE html>
<html>
<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>SuitGarcon</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link href="/app/css/bootstrap.min.css" rel="stylesheet">

    <!-- script
    ================================================== -->
    <script src="/app/views/js/modernizr.js"></script>
    <script src="/app/views/js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>
<body>

    <div style="margin-top: 15%;" class="py-5 text-center">
        <h2>Payment Successful!</h2>
        <p class="lead">The payment has been completed successfully. We have sent you your receipt by email.</p>
    </div>

   <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>  
</body>
</html>