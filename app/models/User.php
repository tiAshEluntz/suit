<?php 

	Class User extends Model{

		var $username;
		var $hash_pass;
		var $type;
		var $account_status;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO users (username,hash_pass,type,account_status) VALUES (:username, :hash_pass, :type, :account_status)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$this->username, 'hash_pass'=>$this->hash_pass, 'type'=>$this->type, 'account_status'=>$this->account_status]);
		}

		public function remove(){
			$sql = "DELETE FROM users WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$this->username]);
		}

		public function updateAccountType(){
			$sql = "UPDATE users SET type = :type WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$this->username, 'type'=>$this->type]);
		}

		public function updateAccountStatus(){
			$sql = "UPDATE users SET account_status = :account_status WHERE username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$this->username, 'account_status'=>$this->account_status]);
		}

		public function resetPassword(){
			$sql = "UPDATE users SET hash_pass = :hash_pass where username = :username";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username'=>$this->username, 'hash_pass'=>$this->hash_pass]);
		}

		public function getProfile($username){
			$sql = "SELECT * From users Where username = :username";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['username' => $username]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "User");
			return $stmt->fetch();
		}

		public function getAllCompaniesToApprove(){
			$this->model('User');
			$sql = "SELECT * From users Where account_status = 0 AND type = 'Company'";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, "User");
			return $stmt->fetchAll();
		}

		public function approveUser($username){			
			$sql = "UPDATE users SET account_status = 1 WHERE username = :username";
				$sth = self::$_connection->prepare($sql);
				$sth->execute(['username'=>$username]);
		}

		public function unapproveUser($username){			
			$sql = "DELETE FROM users WHERE username = :username";
				$sth = self::$_connection->prepare($sql);
				$sth->execute(['username'=>$username]);
		}

	}
?>