<?php
  include 'app/views/navbar.php';
  $order_id = $data['order_id'];
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
        <h2>Choose a date to start your subscription</h2>
        <p class="lead">You may choose the date at which your recurring orders will start.</p>
   </div>
     <?php echo '<form class="card p-2" action="/Order/ChooseDate/'.$order_id.'" style="display: block; width: 50%; margin-left: auto; margin-right: auto; margin-top: 10px; text-align: center;" method="post" role="form">'; ?>

	    <input style="margin-top: 20px" id="next_date" name="next_date" type="date"></input>
        <br>
        <button style="margin-top: 20px" name="Date" type="submit" class="btn btn-lg btn-block btn-primary">Choose</button>
    </form>



    <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
<script>

	
</script>