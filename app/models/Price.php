<?php 
	Class Price extends Model{

		var $price_id;
		var $item_name;
		var $price;
		
		public function __construct(){
			parent:: __construct();
		}

		public function getPrice($item_name){
			$sql = "SELECT * From prices Where item_name like :item_name";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['item_name' => $item_name]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Price");
			return $stmt->fetch();
		}

		public function getPriceById($price_id){
			$sql = "SELECT * From prices Where price_id like :price_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['price_id' => $price_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Price");
			return $stmt->fetch();
		}

		public function getPrices(){
			$sql = "SELECT * FROM prices";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Price");
			return $stmt->fetchAll();
		}
	}
?>