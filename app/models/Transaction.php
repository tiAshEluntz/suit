<?php 
	Class Transaction extends Model{

		var $transaction_id;
		var $customer_id;
		var $order_id;
		var $payment_id;
		var $order_date;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO transactions (customer_id, order_id, payment_id, order_date) VALUES (:customer_id, :order_id, :payment_id, :order_date)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['customer_id' => $this->customer_id, 'order_id'=>$this->order_id, 'payment_id'=>$this->payment_id, 'order_date'=>$this->order_date]);
		}

		public function remove(){
			$sql = "DELETE FROM transactions WHERE transaction_id = :transaction_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['transaction_id'=>$this->transaction_id]);
		}

		public function getTransaction($transaction_id){
			$sql = "SELECT * FROM transactions WHERE transaction_id=:transaction_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['transaction_id' => $transaction_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Transaction");
			return $stmt->fetch();
		}

		public function getCustomerTransactions($customer_id){
			$sql = "SELECT * FROM transactions WHERE customer_id=:customer_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['customer_id' => $customer_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Transaction");
			return $stmt->fetchAll();
		}
                
        public function getOrderTransactions($order_id){
            $sql = "SELECT t.transaction_id, c.first_name, c.last_name, t.order_id, p.payment_amount, p.createdtime from transactions t JOIN customers c on c.customer_id = t.customer_id JOIN payments p on p.payment_id = t.payment_id   WHERE t.order_id = :order_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['order_id' => $order_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Transaction");
			return $stmt->fetchAll();
        }
	}
?>