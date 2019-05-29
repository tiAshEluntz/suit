<?php
include 'app/views/navBarNotLogged.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SuitGarcon</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SuitGarcon</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="/app/css/bootstrap.min.css">
        <link rel="stylesheet" href="/app/css/signin.css">

        <!--GOOD BOOTSTRAP LINK HERE LINE 13,14 AND BEFORE THE </body> TAG-->
        <link rel="stylesheet" href="/app/css/font-awesome/css/fontawesome.min.css">

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicons
        ================================================== -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

    </head>
    <body>

        <form class="form-signin" action="/Default/Login" method="post" role="form">
            <br><br>
            <div class="py-5 text-center">
                <img src="/app/views/images/logo.png" class="img-fluid" alt="Logo">
                <br><br><br><br>
                <h1 class="display-4">Login</h1>
                <p class="lead">You may now login to get started.</p>
            </div>

            <label class="sr-only" for="username" >Username</label>
            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" autofocus="" required>
            <br>
            <label class="sr-only" for="password">Password</label>
            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
            <br>

            <?php
            $display = "none";
         
            $color = "#e65153";
            $bg_color = "#ffd1d2";
            if (!isset($_SESSION['success']) && !isset($data['message'])) {
                $display = "none";
            } else {
                $display = "block";

                if (isset($_SESSION['success'])) {
                    $color = "black";
                    $bg_color = "lightgreen";
                }
            }
            ?>

            <div class="alert-box alert-box--error hideit" style="display:<?php echo $display ?>; background-color: <?php echo $bg_color ?>; color:<?php echo $color ?>; ">
                <p><?php if ($data != null) {
                echo($data['message']);
            } ?></p>
                <p><?php if ($_SESSION != null) {
                echo($_SESSION['success']);
                $_SESSION['success'] = null;
            } ?></p>
            </div>

            <input class="btn btn-lg btn-primary btn-block" name="login" type="submit" value="Login">
            <p class="mt-5 mb-3 text-muted text-center">SuitGarcon © 2017-2018</p>
        </form>

        <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
    </body>
</html>






