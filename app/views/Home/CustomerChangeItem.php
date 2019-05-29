<?php
  include 'app/views/CustomerNavBar.php';
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
        <h2>Change an Item</h2>
        <p class="lead">You may choose the date at which your recurring orders will start.</p>
      </div>
    <form class="card p-2" action="/Order/Transaction" method="post" role="form">
        <label for="inputState" style="text-align: center">Items</label>
        <div id="item_div" class="form-group col-md-4" style="display: block; margin-left: auto; margin-right: auto;">
          <select name="item_1" id="type" class="form-control">
            <option selected>Choose...</option>
            <?php 
                $items = $this->model('Price')->getPrices();
                foreach ($items as $item) {
                    echo "<option>$item->item_name</option>";
                }
            ?>
          </select>
        </div>
        <div style="display: block; margin-left: auto; margin-right: auto;">
            <button id="addButton" type="button" class="btn btn-primary" action="AddItem" onClick="addOrder()">+</button>
            <input class='btn btn-primary' name='Transaction' type='submit' value='Done'>
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