<?php 
	Class Ticket extends Model{

		var $ticket_id;
		var $customer_id;
		var $subject;
		var $read_status;
		var $create_date;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO tickets (customer_id, subject, read_status, create_date) VALUES (:customer_id, :subject, :read_status, :create_date)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['customer_id' => $this->customer_id, 'subject'=>$this->subject, 'read_status'=>$this->read_status, 'create_date'=>$this->create_date]);
		}

		public function remove(){
			$sql = "DELETE FROM tickets WHERE ticket_id = :ticket_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['ticket_id'=>$this->ticket_id]);
		}

		public function updateReadStatus(){
			$sql = "UPDATE tickets SET read_status = :read_status WHERE ticket_id = :ticket_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['read_status'=>$this->read_status, 'ticket_id'=>$this->ticket_id]);
		}

		public function getTicket($ticket_id){
			$sql = "SELECT * FROM tickets WHERE ticket_id=:ticket_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['ticket_id' => $ticket_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
			return $stmt->fetch();
		}

		public function getAllTickets(){
			$sql = "SELECT * FROM tickets Where read_status = 1";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
			return $stmt->fetchAll();
		}

		public function getCustomerTickets($customer_id){
			$sql = "SELECT * FROM tickets Where customer_id = :customer_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['customer_id'=>$customer_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Ticket");
			return $stmt->fetchAll();
		}

		public function setAsRead($ticket_id){
	
			$this->model('Ticket');
			$sql = "UPDATE tickets SET read_status = 0 WHERE ticket_id = :ticket_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['ticket_id'=> $ticket_id]);			
		}
                
                public function setRead(){
	
			$this->model('Ticket');
			$sql = "UPDATE tickets SET read_status = 0 WHERE ticket_id = :ticket_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['ticket_id'=> $this->ticket_id]);			
		}

	}
?>