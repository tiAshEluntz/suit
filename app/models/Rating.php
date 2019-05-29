<?php 
	Class Rating extends Model{

		var $rating_id;
		var $order_id;
		var $customer_id;
		var $rating;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO ratings (order_id, customer_id, rating) VALUES (:order_id, :customer_id, :rating)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['order_id' => $this->order_id, 'customer_id'=>$this->customer_id, 'rating'=>$this->rating]);
		}

		public function remove(){
			$sql = "DELETE FROM ratings WHERE rating_id = :rating_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['rating_id'=>$this->rating_id]);
		}

		public function updateRating(){
			$sql = "UPDATE ratings SET rating = :rating WHERE ticket_id = :ticket_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['rating'=>$this->rating, 'ticket_id'=>$this->ticket_id]);
		}

		public function getRating($rating_id){
			$sql = "SELECT * FROM ratings WHERE rating_id=:rating_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['rating_id' => $rating_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Rating");
			return $stmt->fetch();
		}
                
                public function getAllRatings(){
			$sql = "select r.rating_id, r.customer_id, r.rating, r.order_id , c.first_name, c.last_name FROM ratings r JOIN customers c on c.customer_id = r.customer_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Rating");
			return $stmt->fetchAll();
		}
                
                
	}
?>