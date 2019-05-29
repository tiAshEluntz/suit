<?php 
	Class Customer extends Model{

		var $customer_id;
		var $username;
		var $company_username;
		var $first_name;
		var $last_name;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO customers (username, company_username, first_name, last_name) VALUES (:username, :company_username, :first_name, :last_name)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$this->username, 'company_username'=>$this->company_username, 'first_name'=>$this->first_name, 'last_name'=>$this->last_name]);
		}

		public function remove(){
			$sql = "DELETE FROM customers WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$user = $this->model('User');
			$user->username = $this->username;
			$sth->execute(['username'=>$this->username]);
			$user->remove();
		}

		public function updateFirstName(){
			$sql = "UPDATE customers SET first_name = :first_name WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['first_name'=>$this->first_name, 'username'=>$this->username]);
		}

		public function updateLastName(){
			$sql = "UPDATE customers SET last_name = :last_name WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['last_name'=>$this->last_name, 'username'=>$this->username]);
		}

		public function getCustomer($username){
			$sql = "SELECT * From customers Where username = :username";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['username' => $username]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Customer");
			return $stmt->fetch();
		}
                
                public function getCustomerById($id){
			$sql = "SELECT * From customers Where customer_id = :id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['id' => $id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Customer");
			return $stmt->fetch();
		}
	}
	
?>