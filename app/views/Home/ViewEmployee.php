<?php
include 'app/views/AdminNavBar.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$employees = $data['employees'];
$username = $data['username'];
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
        

</head>
   
<body>
      <?php 
 if(isset($data['first']) && $data['first'] == "true"){
     echo '<div class="alert alert-Danger" role="alert">
  <h4 class="alert-heading">Are you sure you want to delete this employee?!</h4>
  <a href="/Admin/ManageEmployee/true/true/'.$username.'"><span class="badge badge-danger">Yes, delete</span></a>

  <hr>
<a href = "/Admin/ManageEmployee/false/false/none"><span class="badge badge-primary">Cancel</span></a>
</div>';
     
     
 }
 
 
 ?>
    
<div class="py-5 text-center">
        <h2>Employees</h2>
        <p class="lead">Employee Management.</p>
      </div>
        
<table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Type</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    
    <?php 
    
    foreach ($employees as $employee) {
        echo '<tr>';
        echo '<td>'."$employee->first_name".'</td>';
        echo '<td>'."$employee->last_name".'</td>';
        echo '<td>'."$employee->type".'</td>';

        echo '<td><a class="btn btn-primary" href="/Admin/ManageEmployee/'."true/false/$employee->username".'">'."Delete Employee".'</a></td>';
        echo '</tr>';

    }
        
    
       
    ?>
    
     </tbody>
</table>
    
    
    
    
        
<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
