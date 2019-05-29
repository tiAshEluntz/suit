<?php
  include 'app/views/AdminNavBar.php';
echo"
<!DOCTYPE html>
<head>
    <title>SuitGarcon...Company</title>

    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content='>
   
     <!--GOOD BOOTSTRAP LINK HERE LINE 13,14 AND BEFORE THE </body> TAG-->
    <link href='/app/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='/app/css/font-awesome/css/fontawesome.min.css'>

    <!-- CSS
	================================================== -->
	<link href='/app/css/bootstrap.min.css' rel='stylesheet'>

	<!-- script
	================================================== -->
	<script src='/app/views/js/modernizr.js'></script>
	<script src='/app/views/js/pace.min.js'></script>
</head>
<body>

<script src='/app/views/Js/jquery-3.2.1.min.js' type='text/javascript'></script>
<script src='/app/views/Js/popper.min.js' type='text/javascript'></script>
        <!-- Bootstrap Core JavaScript -->
        <script src='/app/views/Js/bootstrap.min.js' type='text/javascript'></script>  

<div class='py-5 text-center'>
        <h2>Companies To Approve</h2>
        <p class='lead'>You may approve company account requests.</p>
      </div>
<table style='display: block; width: 80%; margin-left: 25%;' class='table'>

<tr><th style='width: 25%;' >User</th><th style='width: 25%;' >Type</th>/<th style='width: 25%;' >Actions</th></tr>
<form method='post' action=''>



";

foreach ($data['users'] as $user) {
echo"
<tr>
	<td><input type='text' name='username' style='border: none;' value='$user->username' readonly/></td>
	<td>$user->type</td>
	<td><button name='approved' type='submit' class='btn btn-primary' formaction='/Admin/Approve/$user->username'>Approve</button>
	<button name='unapproved' type='submit' class='btn btn-danger' formaction='/Admin/Unapprove/$user->username'>Unapprove</button></td>
</tr>


";

}
echo "</form></table>

<br>

<div class='py-5 text-center'>
        <h2>Tickets</h2>
        <p class='lead'>You may respond to the customers' tickets.</p>
      </div>

<table style='display: block; width: 80%; margin: auto;' class='table'>
<tr colspan='15'><th style='width: 25%;' colspan='3'>Ticket #</th><th style='width: 25%;' colspan='3'>Customer #</th><th style='width: 20%;' colspan='3'>Subject</th><th style='width: 15%;' colspan='3'>Create Date</th><th style='width: 35%;' colspan='3'>Actions</th></tr>

";

if(is_array($data['tickets'])){
	foreach ($data['tickets'] as $ticket){

	echo "
	<form method='post' action=''>
	<tr colspan='18'>
		<td colspan='3'><input type='text' id='ticketId' style='border: none;' value='$ticket->ticket_id' readonly/></td>
		<td id='customerId' colspan='3'>$ticket->customer_id</td>
		<td id='subject' colspan='3'>$ticket->subject</td>
		<td id='createDate' colspan='3'>$ticket->create_date</td>
		<td><button name='setAsRead' class='btn btn-primary' type='submit' formaction='/Admin/SetAsRead/$ticket->ticket_id'>Set as Read</button>


	";

	
	
	echo"</form>
  		<button name='respond' class='btn btn-primary' id='addTextBox' onclick=\"addTextBoxFunction($ticket->ticket_id, $ticket->customer_id, '$ticket->subject');\">Respond</button></td>
  		<div id='addTextBox'></div>
	</tr>

	";
	}


}

echo "
</table>
<br>
<div class='py-5 text-center'>
        <h2>Flagged Reviews</h2>
        <p class='lead'>You may decide if these reviews must be kept or deleted.</p>
      </div>
<table style='display: block; width: 80%; margin: auto;' class='table'>
<tr colspan='12'><th style='width: 20%;' colspan='3'>Review #</th><th style='width: 20%;' colspan='3'>Customer #</th><th style='width: 20%;' colspan='3'>Comment</th><th style='width: 20%;'colspan='3'>Actions</th></tr>

<form method='post' action=''>
";

if(is_array($data['reviews'])){
	foreach ($data['reviews'] as $review){
		echo"
<tr>
	<td colspan='3'><input type='text' name='reviewId' style='border: none;' value='$review->review_id' readonly/></td>
	<td colspan='3'>$review->customer_id</td>
	<td colspan='3'>$review->comment</td>
	<td colspan='3'><button name='real' class='btn btn-primary' type='submit' formaction='/Admin/UnflagReview/$review->review_id'>Leave it</button>
	<button name='fake' class='btn btn-danger' type='submit'  formaction='/Admin/DeleteReview/$review->review_id'>Delete</button></td>
</tr>


";

}
echo "</form></table>";



}

?>
</table>

<script>

//document.getElementById("addTextBox").addEventListener("click", addTextBoxFunction($ticket->ticket_id, $ticket->customer_id, $ticket->subject);

function addTextBoxFunction($selectedTicket, $selectedCustomer, $selectedSubject){


	var output = document.getElementById('addTextBox');
	var ticketId = document.getElementById("ticketId").value;
	//var customerId = document.getElementById("customerId").innerHTML;
	var message = document.getElementById("subject").innerHTML;

	var response = document.getElementById("subject").innerHTML;
	output.innerHTML = "<form action='/Admin/SubmitResponse'  method='post' style='display: block; width: 75%; margin: auto; margin-top: 10px; text-align: center'><p class='lead'>You are currently responding to <b>Ticket #" + $selectedTicket + 
						"</b> from the <b>Customer #" + $selectedCustomer +  
						"</b>... <br><br> The inquiry was the following... <br><b>" + $selectedSubject + 
						 "</b><br><br> <div style='text-align:left' class='lead'>Your Response</div> </p><textarea class='form-control z-depth-1' rows='4' cols='75' class='w-60 ' placeholder='Please respond here...' name='myMessage'></textarea>" +
						 "<br ><br ><button name='submitResponse' class='btn btn-success' type='submit' onclick=\"reloadPage();\"> Submit Response! </button><br ><br >" +
						"<input hidden name='theTicketId' value='  " + ticketId + " '></form>";

}


function reloadPage(){
	window.location.href='/Admin.html';
}


</script>



<!-- // function updateUserAccess(user_id) {
//     var d = {user_id: user_id};
//     $.post('user.php', d);
// }

// UPDATE users SET `account_status` = 0 WHERE `type` = 'Company'
// INSERT INTO TICKETS (ticket_id, customer_id, subject, read_status, create_date) VALUES (1, 2, 'Hello, My Subject', 0, SYSDATE())
// INSERT INTO MESSAGES (message_id, username, ticket_id, message, read_status) VALUES (1, 'walkingLikeAHAHA', 1, 'My issue is the following', 0)

 //

//  <button name='approved' type='submit' formaction='/Admin/Approve'>Approve!</button></td>
//  	<td><button name='unapproved' type='submit' formaction='/Admin/Unapprove'>Unapprove!</button>
// -->
