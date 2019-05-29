<?php
$order_id = $data['order_id'];
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
  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Rate Order #<?php echo $order_id ?></h1>
      <p class="lead">You can rate an order on a scale from 1 to 5.</p>
    </div>
<?php
    echo '<form style="display: block; width: 50%; margin: auto; margin-top: 100px; text-align: center" class="card p-2" action="/Customer/RateService/' . $order_id . '" method="post" role="form">';
    ?>
      <select name="rating" id="type" class="form-control">
            <option selected>Choose...</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          <br>
          <button id="addButton" type="submit" class="btn btn-primary" name="submit">Rate</button>
    </form>
    
    
    
  <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>