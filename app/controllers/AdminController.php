<?php 

class AdminController extends Controller{

	public function Index(){
		if($_SESSION == null || $_SESSION['type'] != "Admin"){
			header('Location:/Default/Login');
		}

		$users = $this->model('User')->getAllCompaniesToApprove();
		$tickets = $this->model('Ticket')->getAllTickets();
		$reviews = $this->model('Review')->getAllReviews();

		$this->view('Home/IndexAdmin', ['tickets' => $tickets, 'users' => $users, 'reviews' => $reviews]);

	}

	public function Approve($username){
		if($_SESSION == null || $_SESSION['type'] != "Admin"){
			header('Location:/Default/Login');
		}

		if(isset($_POST['approved'])){

			$this->model('User')->approveUser($username);
			$users = $this->model('User')->getAllCompaniesToApprove();
			$tickets = $this->model('Ticket')->getAllTickets();
			$reviews = $this->model('Review')->getAllReviews();
			$this->view('Home/IndexAdmin', ['tickets' => $tickets, 'users'=> $users, 'reviews' => $reviews]);
		}
	}

	public function Unapprove($username){
		if($_SESSION == null || $_SESSION['type'] != "Admin"){
			header('Location:/Default/Login');
		}
		
		if(isset($_POST['unapproved'])){
			$reviews = $this->model('Review')->getAllReviews();
			$company = $this->model('Company')->getCompany($username)->remove();
			$users = $this->model('User')->getAllCompaniesToApprove();
			$tickets = $this->model('Ticket')->getAllTickets();
			$this->model('User')->getAllCompaniesToApprove();
			$this->view('Home/IndexAdmin', ['tickets' => $tickets, 'users'=> $users, 'reviews' => $reviews]);
		}
	}

	public function SetAsRead($ticket_id){
		if($_SESSION == null || $_SESSION['type'] != "Admin"){
			header('Location:/Default/Login');
		}
		
		if(isset($_POST['setAsRead'])){
			$reviews = $this->model('Review')->getAllReviews();
			$tickets = $this->model('Ticket')->setAsRead($ticket_id);
			$tickets = $this->model('Ticket')->getAllTickets();

			$users = $this->model('User')->getAllCompaniesToApprove();
			$this->view('Home/IndexAdmin', ['tickets' => $tickets, 'users'=> $users, 'reviews' => $reviews]);
		}
	}

	public function SubmitResponse(){
		if($_SESSION == null || $_SESSION['type'] != "Admin"){
			header('Location:/Default/Login');
		}

		$username = "Admin";

		$myMessage = $_POST['myMessage'];
		$ticketId = $_POST['theTicketId'];

		$ticket = $this->model('Ticket')->setAsRead($ticketId);
		$message = $this->model('Message');


		$theTicket =  $this->model('Ticket')->getTicket($ticketId);
		$customer_id = $theTicket->customer_id;
		$theCustomer = $this->model('Customer')->getCustomerById($customer_id);
		$message->username = $theCustomer->username;
		$message->ticket_id = $ticketId;
		$message->message = $myMessage;
		$message->read_status = 1;
		
		$message->insert();
		$reviews = $this->model('Review')->getAllReviews();
		$users = $this->model('User')->getAllCompaniesToApprove();
		$tickets = $this->model('Ticket')->getAllTickets();
		$this->view('Home/IndexAdmin', ['tickets' => $tickets, 'users'=> $users, 'reviews' => $reviews]);

		// if(isset($_POST['submitResponse'])){
		// 	$message = $_POST['myMessage'];
			
		// 	//$ticket = $this->model('Ticket')->setAsRead($ticket_id);
		// 	//$users = $this->model('User')->getAllCompaniesToApprove();
		// 	//$this->view('Home/IndexAdmin', ['tickets' => $ticket_id, 'users'=> $users]);
		// }
	}

	public function UnflagReview($review_id){
		if($_SESSION == null || $_SESSION['type'] != "Admin"){
			header('Location:/Default/Login');
		}
	
		if(isset($_POST['real'])){
			
			$review = $this->model('Review')->getReview($review_id);
			//review->review_id = $review_id;
			
			$review->unflagReview();
			$tickets = $this->model('Ticket')->getAllTickets();


			$reviews = $this->model('Review')->getAllReviews();
			$users = $this->model('User')->getAllCompaniesToApprove();
			$this->view('Home/IndexAdmin', ['tickets' => $tickets, 'users'=> $users, 'reviews' => $reviews]);
		}
		// $myGetter->review_id = $myTicket;
		// echo $myTicket;

	}

	public function DeleteReview($review_id){
		if($_SESSION == null || $_SESSION['type'] != "Admin"){
			header('Location:/Default/Login');
		}
	
		if(isset($_POST['fake'])){

			$tickets = $this->model('Ticket')->getAllTickets();
			$review = $this->model('Review');
			$review->review_id = $review_id;

			$review->remove();
			$reviews = $this->model('Review')->getAllReviews();
			$users = $this->model('User')->getAllCompaniesToApprove();

			$this->view('Home/IndexAdmin', ['tickets' => $tickets, 'users'=> $users, 'reviews' => $reviews]);
		}

	}

          public function ManageEmployee($conf,$confs,$username){
              $employees = $this->model('Employee')->getAllEmployees();
              
              if($conf === "true" && $confs === "true"){
                  $theEmployee = $this->model('Employee')->getEmployee($username)->remove();
                   
                                $employees = $this->model('Employee')->getAllEmployees();

                                
                               $this->view('/Home/ViewEmployee',['employees'=>$employees,'first'=>"false",'second'=>"false", 'username'=>'none']);

              }
              
              else
              $this->view('/Home/ViewEmployee',['employees'=>$employees,'first'=>$conf,'second'=>$confs, 'username'=>$username]);
              
              
              }


}
?>

