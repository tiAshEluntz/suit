<?php 
	Class Rate extends Model{

		var $rate_id;
		var $name;
		var $cleanings_per_month;

		public function __construct(){
			parent:: __construct();
		}


		public function getRate($rate_id){
			$sql = "SELECT * FROM rates WHERE rate_id=:rate_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['rate_id' => $rate_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Rate");
			return $stmt->fetch();
		}

	}
?>