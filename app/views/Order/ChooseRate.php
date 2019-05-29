<?php
  include 'app/views/navbar.php';
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

    <div class="py-5 text-center">
        <h2>Choose your Dry Cleaning Rate</h2>
        <p class="lead">Please choose the rate at which you would like to have your employees' suits cleaned.</p>
      </div>

    <div class="container">
        <div class="card-deck mb-4 text-center">
            <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"><i>Classic</i></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><a class="text-muted">Month</a>ly</h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>1 Dry Cleanings / Month</li>
              <li>Email support</li>
              <li>Help center access</li>
            </ul>
            <form method="post" action="/Order/ChooseRate/1">
              <button name="rate" type="submit" class="btn btn-lg btn-block btn-primary">Choose</button>
            </form>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"><i>Elegant</i></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">Bi-<a class="text-muted">Month</a>ly</h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>2 Dry Cleanings / Month</li>
              <li>Email support</li>
              <li>Help center access</li>
            </ul>
            <form method="post" action="/Order/ChooseRate/2">
              <button name="rate" type="submit" class="btn btn-lg btn-block btn-primary">Choose</button>
            </form>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"><i>Luxurious</i></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><a class="text-muted">Week</a>ly</h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>4 Dry Cleanings / Month</li>
              <li>Priority email support</li>
              <li>Help center access</li>
            </ul>
            <form method="post" action="/Order/ChooseRate/3">
              <button name="rate" type="luxurious" class="btn btn-lg btn-block btn-primary">Choose</button>
            </form>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal"><i>Prestige</i></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">Bi-<a class="text-muted">Week</a>ly</h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>8 Dry Cleanings / Month</li>
              <li>Phone and email support</li>
              <li>Help center access</li>
            </ul>
            <form method="post" action="/Order/ChooseRate/4">
              <button name="rate" type="submit" class="btn btn-lg btn-block btn-primary">Choose</button>
            </form>
          </div>
        </div>
      </div>
      <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>