<?php 
	Class BillingInfo extends Model{

		var $billing_info_id;
		var $email;
		var $address;
		var $address2;
		var $city;
		var $zip;
		var $customer_id;
		

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO billing_info (email, address, address2, city, zip, customer_id) VALUES (:email, :address, :address2, :city, :zip, :customer_id)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['email' => $this->email, 'address'=>$this->address, 'address2'=>$this->address2, 'city'=>$this->city , 'zip'=>$this->zip , 'customer_id'=>$this->customer_id]);
		}

		public function update(){
			$sql = "UPDATE billing_info SET email = :email, address = :address, address2 = :address2, city = :city, zip = :zip, customer_id = :customer_id WHERE billing_info_id = :billing_info_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['billing_info_id' => $this->billing_info_id, 'email' => $this->email, 'address'=>$this->address, 'address2'=>$this->address2, 'city'=>$this->city , 'zip'=>$this->zip , 'customer_id'=>$this->customer_id]);
		}

		public function remove(){
			$sql = "DELETE FROM billing_info WHERE billing_info_id = :billing_info_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['billing_info_id'=>$this->billing_info_id]);
		}

		public function getCustomerBillingInfo($customer_id){
			$sql = "SELECT * FROM billing_info WHERE customer_id = :customer_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['customer_id' => $customer_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "BillingInfo");
			return $stmt->fetch();
		}
	}
?>