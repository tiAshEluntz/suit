<?php 
	Class Item extends Model{

		var $item_id;
		var $price_id;
		var $status;
		var $transaction_id;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO items (price_id, status, transaction_id) VALUES (:price_id, :status, :transaction_id)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['price_id' => $this->price_id, 'status' => $this->status, 'transaction_id'=>$this->transaction_id]);
		}

		public function remove(){
			$sql = "DELETE FROM items WHERE item_id = :item_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['item_id'=>$this->item_id]);
		}

		public function updateTransactionID(){
			$sql = "UPDATE items SET transaction_id = :transaction_id WHERE item_id = :item_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['transaction_id'=>$this->transaction_id, 'item_id'=>$this->item_id]);
		}
                
        public function updateItemStatus(){
			$sql = "UPDATE items SET status = :status WHERE item_id = :item_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['status'=>$this->status, 'item_id'=>$this->item_id]);
		}

		public function getItem($item_id){
			$sql = "select i.item_id, i.price_id, i.transaction_id, i.status, p.item_name, p.price
from items i join prices p on p.price_id = i.price_id where i.item_id=:item_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['item_id' => $item_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Item");
			return $stmt->fetch();
		}
                
        public function getItemsByTransactions($transaction_id){
            $sql = "select i.item_id, i.price_id, i.transaction_id, i.status, p.item_name, p.price
from items i join prices p on p.price_id = i.price_id where i.transaction_id = :transaction_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['transaction_id' => $transaction_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Item");
			return $stmt->fetchAll();
        }
	}
?>

