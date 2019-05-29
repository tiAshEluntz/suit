<?php 
	Class Company extends Model{

		var $company_id;
		var $username;
		var $company_name;
		var $address;
		var $rate_id;
		var $next_order;
		

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO companies (username,company_name, address) VALUES (:username, :company_name, :address)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username' => $this->username, 'company_name'=>$this->company_name, 'address'=>$this->address]);
		}

		public function remove(){
			$sql = "DELETE FROM companies WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$this->username]);

			$user = $this->model('User');
			$user->username = $this->username;
			$user->remove();
		}

		public function updateCompanyName(){
			$sql = "UPDATE companies SET company_name = :company_name WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['company_name'=>$this->company_name, 'username'=>$this->username]);
		}

		public function updateAddress(){
			$sql = "UPDATE companies SET address=:address WHERE username=:username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['address'=>$this->address, 'username'=>$this->username]);

		}

		public function getCompanyId($username){
			$sql = "SELECT company_id From companies Where username=:username";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['username' => $username]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Company");
			return $stmt->fetch();
		}

		public function getCompany($username){
			$sql = "SELECT * From companies Where username=:username";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['username' => $username]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Company");
			return $stmt->fetch();
		}
                
                public function getCompanyById($id){
			$sql = "SELECT * From companies Where company_id = :id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['id' => $id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Company");
			return $stmt->fetch();
		}



		public function getCustomerToApprove($company_username){
			$this->model('User');
			$sql = "SELECT c.username, c.first_name, c.last_name, c.company_username from customers c  join users u on u.username = c.username
			Where c.company_username =:username and u.account_status = 0";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['username' => $company_username]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "User");
			return $stmt->fetchAll();
		}

		public function setRate($rate_id, $username){
			$sql = "UPDATE companies SET rate_id = :rate_id WHERE username=:username";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['rate_id' => $rate_id, 'username' => $username]);
		}

		public function setNextOrder($next_order, $username){
			$sql = "UPDATE companies SET next_order = :next_order WHERE username=:username";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['next_order' => $next_order, 'username' => $username]);
		}

		public function approuveCustomer($customerUsername){
			$this->model('User');
			$sql = "UPDATE users SET account_status = 1 WHERE username = :username and type = 'Customer'";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$customerUsername]);			
		}

		public function declineCustomer($customerUsername){
			$this->model('User');
			$sql = "DELETE from users WHERE username = :username and type = 'Customer'";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$customerUsername]);			
		}
		
		       
        public function getEmployees($companyUsername){
            $this->model('Customer');
            $sql = "SELECT * FROM customers WHERE company_username = :company_username ";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['company_username' => $companyUsername]);
			$stmt->setFetchMode(PDO::FETCH_CLASS, "Company");
			return $stmt->fetchAll();
                    
        }
                
        public function getApprouvedEmployees($companyUsername){
            $this->model('Customer');
            $sql = "SELECT * FROM customers c
			join users u on u.username = c.username
			WHERE company_username =  :company_username
			AND u.account_status = 1";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['company_username' => $companyUsername]);
			$stmt->setFetchMode(PDO::FETCH_CLASS, "Company");
			return $stmt->fetchAll();
                    
        }
	}
?>