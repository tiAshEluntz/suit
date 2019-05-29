<?php 
	Class Employee extends Model{

		var $username;
		var $first_name;
		var $last_name;
		var $type;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO employees (username, first_name, last_name, type) VALUES (:username, :first_name, :last_name, :type)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$this->username, 'first_name'=>$this->first_name, 'last_name'=>$this->last_name, 'type'=>$this->type]);
		}

		public function remove(){
			$sql = "DELETE FROM employees WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$this->username]);
			$user = $this->model('User');
                                                $user->username = $this->username;

			$user->remove();
		}

		public function updateFirstName(){
			$sql = "UPDATE employees SET first_name = :first_name WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['first_name'=>$this->first_name, 'username'=>$this->username]);
		}

		public function updateLastName(){
			$sql = "UPDATE employees SET last_name = :last_name WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['last_name'=>$this->last_name, 'username'=>$this->username]);
		}

		public function getEmployee($username){
			$sql = "SELECT * From employees Where username=:username";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['username' => $username]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Employee");
			return $stmt->fetch();
		}
                
                public function getAllEmployees(){
			$sql = "SELECT * From employees where type != 'Admin'";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Employee");
			return $stmt->fetchAll();
		}
                
                
	}
?>