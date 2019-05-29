<?php
  include 'app/views/EmployeeNavBar.php';
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
    <body>

        <div class="py-5 text-center">
        <h2>Orders</h2>
        <p class="lead">You have to take care of these orders</p>
      </div>

<?php $orders = $data['order'];
echo '<ul class="list-group" style = "display: block; width: 50%;margin: auto; margin-top:10px;">' ;
foreach($orders as $order){
echo '<li class="list-group-item">'."Order Status: $order->status </br> Order For Company: <strong>$order->company_name</strong>  <br>Order Pick up Date: $order->pickup <br> Order Delivery Date: $order->delivery  </br>" . ' <a style="margin-top: 10px;" class="btn btn-primary" href ="/Employee/viewOrderDetails/'.($order->order_id).'">View Order </a><a style="margin-top: 10px; float: right;"class="btn btn-primary" style= "float:right;" href ="/Employee/editOrderStatus/'.($order->order_id).'">Edit Status </a></li>';
echo '<br>';
}
?>
<?='</ul>'?>

        
        <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>   
    </body>
</html>
<?php
?>
