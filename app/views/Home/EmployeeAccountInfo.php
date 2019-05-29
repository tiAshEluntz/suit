<?php
include 'app/views/EmployeeNavBar.php';
/* s
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$theUser = $data['user'];
$theEmployee = (object) $data['employee'];
$username = $theUser->username;

$readOnly = "readonly";
//var_dump($theEmployee);
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
        <h2>Account Info</h2>
        <p class="lead">You may edit your account information.</p>
      </div>

        <form style="display: block; width: 50%; margin: auto; text-align: center" action="/Home/editInfo" method="POST">
            <div class="form-group" >
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" value=" <?php echo $_SESSION['username']; ?>" <?= $readOnly ?>>
                <small id="emailHelp" class="form-text text-muted">You can never change your username... Sorry :(</small>
            </div>
            <div class="form-group" >
                <label for="exampleInputPassword1">Password</label>
                <input type="password" id="passwordChange" class="form-control" id="exampleInputPassword1" placeholder="***********" readonly> <a id="changePass" href="/Home/passwordRedirect" hidden>Change Password</a>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">First Name</label>
                <input type="text" name="first_name" id="first_name" tabindex="1" class="form-control"  value=" <?= $theEmployee->first_name; ?> " <?= $readOnly ?>>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Last Name</label>
                <input type="text" name="last_name" id="last_name" tabindex="2" class="form-control"  value="<?= $theEmployee->last_name ?>" readonly>
            </div>



            <div class="form-group">
                <label for="exampleInputPassword1">User Type</label>
                <input type="text" name="userType" id="userType" tabindex="2" class="form-control" placeholder="Address" value="<?= $theUser->type ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Employee Domain</label>
                <input type="text" name="usertType" id="usertType" tabindex="2" class="form-control"  value="<?= $theEmployee->type ?>" readonly>
            </div>       

            <button style="float:right;" type="reset" id="cancel" class="btn btn-danger" onclick="nonEdit()" hidden>Cancel</button>
            <button style="float:right; margin-right: 5px" id="editInfo" type="button" class="btn btn-primary" onclick="edit()">Edit info</button>

            <button style="float:right; margin-right: 5px" type="submit" name="saveButton_submit" id="saveButton" class="btn btn-primary" hidden>Save</button>


        </form> 


        <script>

            function edit() {
                $('input').removeAttr('readonly');
                $('#cancel').removeAttr("hidden");
                $('#editInfo').attr("hidden", "hidden");
                $('#editInfo').attr("hidden", "hidden");

                $('#saveButton').removeAttr("hidden");
                $('#changePass').removeAttr("hidden");

                $('#passwordChange').attr("readonly", "readonly");
                $('#username').attr("readonly", "readonly");
                $('#userType').attr("readonly", "readonly");           
                $('#usertType').attr("readonly", "readonly");


            }

            function nonEdit() {
                $('input').attr("readonly", "readonly");
                $('#cancel').attr("hidden", "hidden");
                $('#saveButton').attr("hidden", "hidden");
                $('#editInfo').removeAttr("hidden");
                $('#passwordChange').attr("readonly", "readonly");
                $('#changePass').attr("hidden", "hidden");




            }

        </script>
        <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
    </body>
</html>
