<?php
  include 'app/views/EmployeeNavBar.php';

  
  $company_name = "";
  $status = "";
  $pickup = "";
  $delivery = "";
  $order_id = "";
    if(isset($data['order'])){
 $order = $data['order'];
 
 $company_name = $order->company_name;
 $status = $order->status;
 $pickup = $order->pickup;
 $delivery = $order->delivery;
 $order_id = $order->order_id;
 }
  
  ?>

<!DOCTYPE html>
<html>
    <head>
        <title>SuitGarcon</title>

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
    <body style="background-color: lightgray;">



<form style="display: block; width: 50%;margin: auto; margin-top:100px;" action="/Employee/editStatus/<?php echo $order_id?>" method="POST">
   
    
    
    <div class="input-group">
            <label for="type">Order Status</label>

		  <select name="status" id="type" class="custom-select" id="status_select">
		    <option selected><?php echo "$status"?></option>
		    <option value="Done">Done</option>
		    <option value="Late">Late</option>
		    <option value="Delivering">Delivering</option>
                   <option value="Delivered">Delivered</option>
                   <option value="Pending">Pending</option>

		  </select>
		</div>
    
    <br><hr>
  <div class="form-group" >
    <label for="company_name">Order For Company</label>
    <input type="text" id="company_name" class="form-control" value="<?php echo $company_name?>" readonly> 
  </div>
    
    <div class="form-group">
            <label for="pickup">Order Pick up Date</label>
	<input type="text" name="pickup" id="pickup" tabindex="1" class="form-control" value=" <?= $pickup ?> " readOnly>
</div>

 <div class="form-group">
<label for="exampleInputPassword1">Order Delivery Date</label>
<input type="text" name="delivery" id="delivery" tabindex="2" class="form-control"  value="<?= $delivery ?>" readOnly>
</div>
                
    <button style="float:right;" type="reset" id="cancel" class="btn btn-danger" onClick="document.location.href = '/Employee/viewMyOrders'">Cancel</button>       
        <button style="float:right; margin-right: 5px" type="submit" name="saveButton_submit" id="saveButton" class="btn btn-success" >Save</button>

        
    </form> 

    

        
        <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>   
    </body>
</html>
<?php
?>
