<?php
  include 'app/views/CustomerNavBar.php';
  $review = $data['review'];
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
        <h2>Review Our Services</h2>
        <p class="lead">You may edit or enter a review for our services to say what you think about them.</p>
      </div>
    <form style="display: block; width: 50%; margin: auto; text-align: center"class="card p-2" action="/Customer/Review" method="post" role="form">
        <div id="item_div" class="form-group col-md-4" style="display: block; margin-left: auto; margin-right: auto;">

        </div>
        <div>
            <textarea rows="4" cols="50" name='comment' type='text'><?php echo $review?></textarea>
            <br>
            <input style="margin-top: 15px;"class='btn btn-primary' name='review' type='submit' value='Review'>
            <input style="margin-top: 15px;"class='btn btn-danger' name='remove' type='submit' value='Remove'>
        </div>
      </form>
    <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
<script>

	
</script>