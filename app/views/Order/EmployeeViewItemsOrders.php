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
    <body style="background-color: lightgray;">

<?php $items = $data['item'];
echo '<ul class="list-group" style = "display: block; width: 50%;margin: auto; margin-top:100px;">' ;
foreach($items as $item){
echo '<li class="list-group-item">'."Item Status: $item->status <br> Item Type: $item->item_name  </br>" . '<a style= "float:right; color:green;" href ="/Employee/editItemStatus/'.($item->item_id).'">Edit Status </a><hr></li>';
//echo 'test';
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
