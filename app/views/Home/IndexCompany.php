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
        

</head>
    <body>
    
<div class="py-5 text-center">
        <h2>Users To Approve</h2>
        <p class="lead">You may now approve company account requests.</p>
      </div>


<?php 
if($data != null && isset($data['confirmation']) && $data['confirmation'] == "true"){
$usernameFound = $data['username'];

  echo '<div class="alert alert-danger" role="alert">
  Are you sure you want to decline user '."$usernameFound?".' <a href="/Company/declineRequest/' . $usernameFound .'/true" class="alert-link">Click here to confirm</a>. Not sure? <a href="/Company/approuveEmployee" class="alert-link">Click here to Cancel</a>
</div>';
}
if($data != null && isset($data['message']) && $data['message'] == "true"){
  $usernameFound = $data['username'];

  echo '<div class="alert alert-success" role="alert">
  You have accepted the request from user' . $usernameFound . ' He is now considered to be part of your company
</div>';
}

 ?>

<?php 

$counter = 0;

if(count($data['employees']) == 0){

	echo "<div class='pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center'>
<h2 class='display-4'>...</h2>
</div>";
}
else{
	echo'<div class="card-columns">';
foreach($data['employees'] as $employee){
// SELECT c.username, c.first_name, c.last_name, c.company_username from customers c  join users u on u.username = c.username
echo '
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Request from '."$employee->first_name $employee->last_name</h5>".'
    <h6 class="card-subtitle mb-2 text-muted">Do you know me? my username is '."$employee->username</h6>".'
    <p class="card-text">'."$employee->first_name $employee->last_name".' wishes to be part of your company. He claims that he works for'." $employee->company_username".'</p>
    <a href="/Company/acceptRequest/'."$employee->username". '" class="card-link">Accept</a>
    <a href="/Company/declineRequest/'."$employee->username/false". '" class="card-link">Decline</a>
  </div>
</div>
';
}
}
?>
</div>	


<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
