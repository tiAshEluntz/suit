<?php
  include 'app/views/navbar.php';
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
        <h2>Your Employee's Orders</h2>
        <p class="lead">You may now view each of your employees' transactions.</p>
      </div>

<?php $employees = $data['employees'];
echo '<ul class="list-group" style = "display: block; width: 50%; margin: auto;">' ;
foreach($employees as $employee){
echo '<li style="height: 60px;" class="list-group-item">'."$employee->username" . ' <a  style="float: right;" class="btn btn-primary" href ="/Company/companyViewOrder/'.($employee->username).'">View Order </a></li>';
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
