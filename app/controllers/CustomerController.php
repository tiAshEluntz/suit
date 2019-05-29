<?php 

	class CustomerController extends Controller{

		public function Index(){
			if($_SESSION == null || $_SESSION['type'] != "Customer"){
				header('Location:/Default/Login');
			}

			$tickets = $this->model('Ticket')->getAllTickets();
			$this->view('Home/SupportView', ['tickets' => $tickets]);


		}

		public function Transactions(){
			if($_SESSION == null || $_SESSION['type'] != "Customer"){
				header('Location:/Default/Login');
			}
			
			else{
                            
				$customer = $this->model('Customer')->getCustomer($_SESSION['username']);

                                $transactions = $this->model('Transaction')->getCustomerTransactions($customer->customer_id);
                                
				$this->view('Home/CustomerTransactions', ['transactions'=>$transactions]);
			}
		}

		public function Items($transaction_id){
			if($_SESSION == null || $_SESSION['type'] != "Customer"){
				header('Location:/Default/Login');
			}
			
			else{
				$items = $this->model('Item')->getItemsByTransactions($transaction_id);
				$this->view('Home/CustomerTransactionsItems', ['items'=>$items, 'transaction_id'=>$transaction_id]);
			}
		}

		public function DeleteTransaction($transaction_id){
			if($_SESSION == null || $_SESSION['type'] != "Customer"){
				header('Location:/Default/Login');
			}
			
			else{
				$transaction = $this->model('Transaction');
				$transaction->transaction_id = $transaction_id;
				$transaction->remove($transaction_id);
				header('Location: /Customer/Transactions');
			}
		}

		public function RateService($order_id){
			if($_SESSION == null || $_SESSION['type'] != "Customer"){
				header('Location:/Default/Login');
			}
			
			else{
				if(!isset($_POST['submit'])){
					$this->view('Home/RateService', ['order_id'=>$order_id]);
				}

				if(isset($_POST['submit']) and $_POST['rating'] != "Choose..."){
					$rating = $this->model('Rating');
					$customer = $this->model('Customer')->getCustomer($_SESSION['username']);

					$rating->customer_id = $_SESSION['username'];
					$rating->order_id = $order_id;
					$rating->customer_id = $customer->customer_id;
					$rating->rating = $_POST['rating'];
					$rating->insert();

                                                header('Location: /Customer/viewAllReviews');
				}
			}
		}

		public function ViewOrder(){

			if($_SESSION == null || $_SESSION['type'] != "Customer"){
				header('Location:/Default/Login');
			}
			else{
				$this->view('Order/CustomerViewOrder', null);
			}
		}


		public function CompanyOrders(){
			if($_SESSION == null || $_SESSION['type'] != "Customer"){
				header('Location:/Default/Login');
			}
			
			else{
				$customer = $this->model('Customer')->getCustomer($_SESSION['username']);
				$company = $this->model('Company')->getCompany($customer->company_username);
				$orders = $this->model('Order')->getCompanyOrders($company->company_id);

				$this->view('Order/CustomerViewOrders', ['orders'=>$orders]);
			}
		}

		public function Review(){
			if($_SESSION == null || $_SESSION['type'] != "Customer"){
				header('Location:/Default/Login');
			}
			
			else{

				$customer = $this->model('Customer')->getCustomer($_SESSION['username']);

				if(!isset($_POST['review'])){

					if(isset($_POST['remove']) && $_POST['comment'] != ""){
						$review = $this->model('Review')->getCustomerReview($customer->customer_id);
						$review->remove();
                                                header('Location: /Customer/viewAllReviews');
					}
					else{

						$review = $this->model('Review')->getCustomerReview($customer->customer_id);

						if($review != false){
							$this->view('Home/CustomerReview', ['review'=>$review->comment]);
						}
						else{
							$this->view('Home/CustomerReview', ['review'=>""]);
						}
					}
					
				}

				if(isset($_POST['review'])){

					$review = $this->model('Review')->getCustomerReview($customer->customer_id);

					if($review != false){
						//$this->view('Home/CustomerReview', ['review'=>$review->comment]);

						$review->comment = $_POST['comment'];
						$review->updateText();
					}
					else{
						$review = $this->model('Review');
						$review->customer_id = $customer->customer_id;
						$review->comment = $_POST['comment'];
						$review->flagged = 0;
						$review->insert();
					}
					

                                                header('Location: /Customer/viewAllReviews');
				}
			}
		}

		public function BillingInfo(){
			if($_SESSION == null || $_SESSION['type'] != "Customer"){
				header('Location:/Default/Login');
			}
			
			else{
				$customer = $this->model('Customer')->getCustomer($_SESSION['username']);
				$billing = $this->model('BillingInfo')->getCustomerBillingInfo($customer->customer_id);

				if(!isset($_POST['save'])){
					if(isset($_POST['remove'])){
						$billing->remove();
						$this->view('Home/CustomerBillingInfo', ['billing'=>null]);
					}
					else{
						$this->view('Home/CustomerBillingInfo', ['billing'=>$billing]);
					}

					
				}

				else if(isset($_POST['save'])){

					if($billing != false){
						$billing->email = $_POST['email'];
						$billing->address = $_POST['address'];
						$billing->address2 = $_POST['address2'];
						$billing->city = $_POST['city'];
						$billing->zip = $_POST['zip'];
						$billing->customer_id = $customer->customer_id;
						$billing->update();

					}
					else{
						$new_billing = $this->model('BillingInfo');
						$new_billing->email = $_POST['email'];
						$new_billing->address = $_POST['address'];
						$new_billing->address2 = $_POST['address2'];
						$new_billing->city = $_POST['city'];
						$new_billing->zip = $_POST['zip'];
						$new_billing->customer_id = $customer->customer_id;
						$new_billing->insert();

						$billing = $this->model('BillingInfo')->getCustomerBillingInfo($customer->customer_id);

					}

					$this->view('Home/CustomerBillingInfo', ['billing'=>$billing]);
					
				}
			}
		}
                
                
                
        public function viewAllReviews(){
            
            $ratings = $this->model('Rating')->getAllRatings();
            $reviews = $this->model('Review')->getNonFlaguedReviews();
            
            
            $this->view('Home/AllReviews',['reviews'=>$reviews,'ratings'=>$ratings]);
            
        }
        
        public function flagReview($review_id){
            $theReview = $this->model('Review')->getReview($review_id);
            $theReview->flagReview();
            header('Location:/Customer/viewAllReviews');
            
        }
        
        
        public function customerSupport(){
            $customer = $this->model('Customer')->getCustomer($_SESSION['username']);
        	$tickets = $this->model('Ticket')->getCustomerTickets($customer->customer_id);
            $this->view('/Home/SupportView',['tickets' => $tickets]);
            
        }
        
        public function submitTicket(){
            if(isset($_POST['submitButton'])){
                $theCustomer = $this->model('Customer')->getCustomer($_SESSION['username']);
                
                $ticket = $this->model('Ticket');
                $ticket->customer_id = $theCustomer->customer_id;
                $ticket->subject = $_POST['subject'];
                $ticket->read_status = 1;
                $ticket->create_date = date("Y-m-d");
                $ticket->insert();   
                
                $this->view('/Home/SupportView',['info'=>'true']);


            }
            
        }
        
        public function showNewMessages(){
            
          $this->view('/Home/newMessage',null);

        }
        
        public function test($session_name,$message_id){
            $realMessageName = 'message'.$session_name;
            $_SESSION[$realMessageName] = null;
          
          $theMessage = $this->model('Message')->getMessage($message_id);   
          $theMessage->setRead();
//          var_dump($theMessage);
           $this->view('/Home/newMessage',null);

       }

       public function CustomerViewTickets(){
       		$customer = $this->model('Customer')->getCustomer($_SESSION['username']);
        	$tickets = $this->model('Ticket')->getCustomerTickets($customer->customer_id);
        	var_dump($tickets);

        	$this->view('/Home/SupportView',['tickets' => $tickets]);
    	}
        
        public function answerTicket($ticket_id){
            
           $theTicket = $this->model('Ticket')->getTicket($ticket_id);
            
           //$this->view('/Home/SupportView',['ticket' => $theTicket]);
  
        }  
	}
?>