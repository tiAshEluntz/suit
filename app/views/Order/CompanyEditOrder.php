<?php
 

include 'app/views/navbar.php';
/* s
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$order = $data['order'];
$readOnly = "readonly";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Settings</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
  <!--GOOD BOOTSTRAP LINK HERE LINE 13,14 AND BEFORE THE </body> TAG-->
  <link href="/app/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/app/css/font-awesome/css/fontawesome.min.css">

      <!-- CSS
    ================================================== -->
    <link href="/app/css/bootstrap.min.css" rel="stylesheet">

    <!-- script
    ================================================== -->
    <script src="/app/views/js/modernizr.js"></script>
    <script src="/app/views/js/pace.min.js"></script>


</head>

<body style="background-color: white;">

      <div class="py-5 text-center">
        <h2>Edit Order # <?= $order->order_id ?></h2>
        <p class="lead">You may now edit the order.</p>
   </div> 
    <form style="display: block; width: 50%; margin: auto; margin-top: 40px; text-align: center" action="/Order/EditOrder/<?=$order->order_id ?>" method="POST">
    <div class="form-group" >
    <label for="status">Status</label>
    <input type="text" class="form-control" id="status" name="status"  value=" <?php echo $order->status?>" <?= $readOnly?>>
    
  </div>
  <div class="form-group" >
    <label for="exampleInputPassword1">Location</label>
    <input type="text" id="location" class="form-control" name="location"
    value=" <?php echo $order->location?>" readonly>
  </div>
    
        <label for="exampleInputPassword1" >Pickup Date</label>

    <div class="input-group">
             
	<input type="text" name="pickup" id="pickup" tabindex="1" class="form-control"  value=" <?php echo $order->pickup?>" <?= $readOnly?>>
        <span class="input-group-btn" id="deleteButton" hidden>
    <button style="margin-left: 5px" class="btn btn-danger" type=type="submit" name="deleteButton" >Delete!</button>
  </span>
    </div>

<div class="form-group">
        <label for="exampleInputPassword1">Delivery Date</label>
        <input type="text" name="delivery" id="delivery" tabindex="2" class="form-control"  value=" <?php echo $order->delivery?>" readonly>
</div>

                
        <button style="float:right;" type="reset" id="cancel" class="btn btn-danger" onclick="nonEdit()" hidden>Cancel</button>
        <button style="float:right; margin-right: 5px" id="editInfo" type="button" class="btn btn-primary" onclick="edit()">Edit Order</button>
        
        <button style="float:right; margin-right: 5px" type="submit" name="saveButton_submit" id="saveButton" class="btn btn-primary" hidden>Save</button>

        
    </form> 

    
<script>
  
  function edit(){
    $('input').removeAttr('readonly');
    $('#cancel').removeAttr("hidden");
    $('#editInfo').attr("hidden", "hidden");
    $('#editInfo').attr("hidden", "hidden");
    $('#deleteButton').removeAttr("hidden");

    $('#saveButton').removeAttr("hidden");

    $('#pickup').removeAttr("type");

    $('#pickup').attr("type", "date");

    $('#delivery').attr("readonly", "readonly");

    $('#status').attr("readonly", "readonly");

  }

  function nonEdit(){
    $('input').attr("readonly", "readonly");
    $('#cancel').attr("hidden", "hidden");
    $('#saveButton').attr("hidden", "hidden");
    $('#editInfo').removeAttr("hidden");  
    $('#deleteButton').attr("hidden", "hidden");

  }
    
</script>
<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
