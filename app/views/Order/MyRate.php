<?php
  include 'app/views/navbar.php';
  $rate = $data['rate'];
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
    <div style="margin-top: 200px;" class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">You already have a(n) <?php echo "$rate->name"; ?> rate</h1>
      <p class="lead"><?php echo "($rate->cleanings_per_month cleaning(s) per month)"; ?></p>
      <p class="lead"><strong>Do you wish to change your rate?</strong></p>
      <form action="/Order/Rates" method="post" role="form">
        <button id="changeRate" name="change" type="submit" class="btn btn-primary">Change Rate</button>
      </form>
    </div>
      <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>