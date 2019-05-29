<?php
  include 'app/views/CustomerNavBar.php';
  $next_order = $data['next_order'];
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

      <!--GOOD BOOTSTRAP LINK HERE LINE 13,14 AND BEFORE THE </body> TAG-->
        <link href="/app/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/app/css/font-awesome/css/fontawesome.min.css">
        
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
  <div class="container">
      <div class="py-5 text-center">
        <h2>Add Items for Dry Cleaning</h2>
        <p class="lead">You may add all the items that you would like to be dry cleaned with your company's next order.</p>
        <?php echo "<h5>Your company's next order will be on $next_order</h5>"?>
      </div>

    <div id="alert" style="display: none; text-align: center;" class='alert alert-danger' role='alert'>You have reached the limit of items per transaction!</div>

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
    var select_id = 2;

    function addOrder(){
        var item_div = document.getElementById("item_div");
        var alert = document.getElementById("alert");
        var addButton = document.getElementById("addButton");
        
        if(select_id <= 10){
            item_div.innerHTML += //change to append child
                "<br><select name='item_" + select_id + 
                "' class='form-control'><option selected>Choose...</option>" +
                "<option>2 Piece Suite</option>" +
                "<option>Jacket / Blazer</option>" +
                "<option>Trouser</option>" +
                "<option>Skirt</option>" +
                "<option>Pleated Skirt</option>" +
                "<option>Linen Skirt</option>" +
                "<option>Blouse</option>" +
                "<option>Jumper</option>" +
                "<option>Scarf</option>" +
                "<option>Dress (Short)</option>" +
                "<option>Dress (Long)</option>" +
                "<option>Coat</option>" +
                "<option>Rain Coat</option>" +
                "<option>Shorts</option>" +
                "</select>";

            select_id++;
        }
        else{
           alert.style.display = "block";
           addButton.style.display = "none";
        }
    }
</script>