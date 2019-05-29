<?php 

class EmployeeController extends Controller{

	public function Index(){
		if($_SESSION == null || $_SESSION['type'] != "Employee"){
			header('Location:/Default/Login');
		}

		$orders = $this->model('Order')->getAllOrders();
		$tickets = $this->model('Ticket')->getAllTickets();

		$this->view('Home/IndexEmployee', ['orders' => $orders, 'tickets' => $tickets]);

	}

	public function SetAsRead($ticket_id){
		if($_SESSION == null || $_SESSION['type'] != "Employee"){
			header('Location:/Default/Login');
		}
		
		if(isset($_POST['setAsRead'])){
			$orders = $this->model('Order')->getAllOrders();
			$tickets = $this->model('Ticket')->setAsRead($ticket_id);
		
			$this->view('Home/IndexEmployee', ['orders' => $orders, 'tickets' => $tickets]);
		}
	}

	public function SubmitResponse(){
		if($_SESSION == null || $_SESSION['type'] != "Employee"){
			header('Location:/Default/Login');
		}

		$username = "Employee";

		$myMessage = $_POST['myMessage'];
		$ticketId = $_POST['theTicketId'];

		echo $myMessage;
		echo $ticketId;

		$ticket = $this->model('Ticket')->setAsRead($ticketId);
		$message = $this->model('Message');

		$message->username = $username;
		$message->ticket_id = $ticketId;
		$message->message = $myMessage;
		$message->read_status = 1;
		
		$message->insert();
		$tickets = $this->model('Ticket')->getAllTickets();
		$this->view('Home/IndexEmployee', ['tickets' => $tickets, 'orders' => $orders]);

		// if(isset($_POST['submitResponse'])){
		// 	$message = $_POST['myMessage'];
			
		// 	//$ticket = $this->model('Ticket')->setAsRead($ticket_id);
		// 	//$users = $this->model('User')->getAllCompaniesToApprove();
		// 	//$this->view('Home/IndexAdmin', ['tickets' => $ticket_id, 'users'=> $users]);
		// }
	}

        public function viewMyOrders(){
            if($_SESSION == null || $_SESSION['type'] != "Employee"){
			header('Location:/Default/Login');

                        }
                  
                $employee = $this->model('Employee');
                $theEmployee = $employee->getEmployee($_SESSION['username']);
                 $emp_id = $theEmployee->employee_id;       
                $order = $this->model('Order');
                $orders = $order->getEmployeeOrders($emp_id);
                
            $this->view('/Order/EmployeeViewOrders',['order'=>$orders]);
        }
        
        public function editOrderStatus($order_id){
                        if($_SESSION == null || $_SESSION['type'] != "Employee"){
			header('Location:/Default/Login');

                        }
                         $order = $this->model('Order');
                         
                         $theOrder = $order->getOrder($order_id);
                         
                        $this->view('/Order/EditStatus',['order' => $theOrder]);
            
        }
        
        public function editStatus($order_id){
                    if (isset($_POST['saveButton_submit'])) {
                    
                        $newStatus = $_POST['status'];
                        
                        
                         $order = $this->model('Order');
                         
                         $theOrder = $order->getOrder($order_id);
                         $theOrder->status = $newStatus;
                         $theOrder->updateStatus();

                         $employee = $this->model('Employee');
                $theEmployee = $employee->getEmployee($_SESSION['username']);
                 $emp_id = $theEmployee->employee_id; 
                 
                 
                       $orders = $order->getEmployeeOrders($emp_id);
                
            $this->view('/Order/EmployeeViewOrders',['order'=>$orders]);
                    }
            
        }
        
        public function viewOrderDetails($order_id){
            
            $order = $this->model('Order');
                         
             $theOrder = $order->getOrder($order_id);
             $companyName = $theOrder->company_name;
             
            $transaction = $this->model('Transaction');
            $transactions = $transaction->getOrderTransactions($order_id);
            $this->view('/Order/ViewOrderDetail',['trasaction'=>$transactions, 'name' => $companyName]);

        }
        
        public function viewItemsInOrder($transaction_id){

        $item = $this->model('Item');
        $items = $item->getItemsByTransactions($transaction_id);

       $this->view('/Order/EmployeeViewItemsOrders',['item'=>$items]);


        }
        
        public function editItemStatus($item_id){
                        if($_SESSION == null || $_SESSION['type'] != "Employee"){
			header('Location:/Default/Login');

                        }
                         $item = $this->model('Item');
                         
                         $theItem = $item->getItem($item_id);
                         
                         $transaction =$theItem->transaction_id;
                        $this->view('/Order/EditItemStatus',['item' => $theItem, 'order_id' => $transaction]);
            
        }
        
        public function postEditItemStatus($item_id){
            
            if (isset($_POST['saveButton_submit'])) {
                    
                        $newStatus = $_POST['status'];
                        
                        
                         $item = $this->model('Item');
                         
                         $theItem = $item->getItem($item_id);
                         $theItem->status = $newStatus;
                         $theItem->updateItemStatus();

                         $items = $item->getItemsByTransactions($theItem->transaction_id);

                         header('Location: /Employee/viewMyOrders');
            }
        }
        
        public function EmployeeViewTickets(){
            $tickets = $this->model('Ticket')->getAllTickets();
            $this->view('/Home/EmployeeViewTickets',['tickets' => $tickets]);
        }
            
            public function answerTicket($ticket_id){
                
                $theTicket = $this->model('Ticket')->getTicket($ticket_id);
                
               $this->view('/Home/EmployeeAnswerTickets',['ticket' => $theTicket]);

                
                
            }
            
            public function postTicketAnswer($ticket_id,$customer_id){
                if(isset($_POST['submitButton'])){     
                 $theTicket = $this->model('Ticket')->getTicket($ticket_id);
                 $theTicket->setRead();
                 
                 $theUser = $this->model('Customer')->getCustomerById($customer_id);
                 
                 $answer = $this->model('Message');
                 $answer->ticket_id = $ticket_id;
                 $answer->message = $_POST['message'];
                 $answer->username = $theUser->username;
                 $answer->read_status = 1;
                 $answer->insert();
                             $tickets = $this->model('Ticket')->getAllTickets();

                 $this->view('/Home/EmployeeViewTickets',['tickets' => $tickets,'info'=>'g']);

                 }
            }
            
        

}
?>