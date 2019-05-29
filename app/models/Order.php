<?php 
	Class Order extends Model{

		var $order_id;
		var $company_id;
		var $employee_id;
		var $status;
		var $location;
		var $pickup;
		var $delivery;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO orders (company_id, employee_id, status, location, pickup, delivery) VALUES (:company_id, :employee_id, :status, :location, :pickup, :delivery)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['company_id'=>$this->company_id, 'employee_id'=>$this->employee_id, 'status'=>$this->status, 'location'=>$this->location, 'pickup'=>$this->pickup, 'delivery'=>$this->delivery]);
		}

		public function remove(){
			$sql = "DELETE FROM orders WHERE order_id = :order_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['order_id'=>$this->order_id]);
		}

		public function updateType(){
			$sql = "UPDATE orders SET type = :type WHERE order_id = :order_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['type'=>$this->type, 'order_id'=>$this->order_id]);
		}

		public function updateStatus(){
			$sql = "UPDATE orders SET status = :status WHERE order_id = :order_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['status'=>$this->status, 'order_id'=>$this->order_id]);
		}

		public function updateLocation(){
			$sql = "UPDATE orders SET location = :location WHERE order_id = :order_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['location'=>$this->location, 'order_id'=>$this->order_id]);
		}

		public function setPickupDate(){
			$sql = "UPDATE orders SET pickup = :pickup WHERE order_id = :order_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['pickup'=>$this->pickup, 'order_id'=>$this->order_id]);
		}

		public function setDeliveryDate(){
			$sql = "UPDATE orders SET delivery = :delivery WHERE order_id = :order_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['delivery'=>$this->delivery, 'order_id'=>$this->order_id]);
		}

		public function getAllOrders(){
			$sql = "SELECT * From orders";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
			return $stmt->fetchAll();
		}
                
                public function getOrder($order_id){
			$sql = "Select o.order_id, c.company_id, c.company_name, o.status, o.employee_id, o.location, o.pickup, o.delivery from orders o JOIN companies c on c.company_id = o.company_id
where order_id = :order_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['order_id' => $order_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
			return $stmt->fetch();
		}
                
                
         public function getEmployeeOrders($id){
            $sql = "select o.order_id, c.company_name, o.status, o.location, o.pickup, o.delivery from orders o JOIN companies c on c.company_id = o.company_id
where employee_id = :emp_id;";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['emp_id' => $id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
			return $stmt->fetchAll();       
        }

		public function getCustomerOrders($username){
            $sql = "SELECT * From transactions t INNER JOIN orders o ON o.order_id=t.order_id INNER JOIN customers c ON c.customer_id=t.customer_id where username=:username";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['username' => $username]);
			$stmt->setFetchMode(PDO::FETCH_CLASS, "StdClass");
			$transactions = $stmt->fetchAll();
            return $transactions;
		}

         public function getCompanyOrders($company_id){
            $sql = "select * from orders WHERE company_id = :company_id;";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['company_id' => $company_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Order");
			return $stmt->fetchAll();       
        }
	}
?>