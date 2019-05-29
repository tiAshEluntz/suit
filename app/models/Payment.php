<?php 
	Class Payment extends Model{ //All methods to change, need to check paypal implemention

		var $payment_id;
		var $paypal_key; //TO CHANGE
		var $status;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO payments (paypal_key, status) VALUES (:paypal_key, :status)"; //TO CHANGE
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['paypal_key' => $this->paypal_key, 'status'=>$this->status]); //TO CHANGE
		}

		public function remove(){
			$sql = "DELETE FROM payments WHERE payments = :payments";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['payments'=>$this->payments]);
		}

		public function updateStatus(){
			$sql = "UPDATE payments SET status = :status WHERE payment_id = :payment_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['status'=>$this->status, 'payment_id'=>$this->payment_id]);
		}

		public function getPayment($payment_id){
			$sql = "SELECT * FROM payments WHERE payment_id=:payment_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['payment_id' => $payment_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Payment");
			return $stmt->fetch();
		}
	}
?>