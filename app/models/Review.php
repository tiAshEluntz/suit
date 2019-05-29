<?php 
	Class Review extends Model{

		var $review_id;
		var $customer_id;
		var $comment;
		var $flagged;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO reviews (customer_id, comment, flagged) VALUES (:customer_id, :comment, :flagged)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['customer_id'=>$this->customer_id, 'comment'=>$this->comment, 'flagged'=>$this->flagged]);
		}

		public function remove(){
			$sql = "DELETE FROM reviews WHERE review_id = :review_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['review_id'=>$this->review_id]);
		}

		public function updateText(){
			$sql = "UPDATE reviews SET comment = :comment WHERE review_id = :review_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['comment'=>$this->comment, 'review_id'=>$this->review_id]);
		}

		public function unflagReview(){
			$sql = "UPDATE reviews SET flagged = 0 WHERE review_id = :review_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['review_id'=>$this->review_id]);
		}

		public function flagReview(){
			$sql = "UPDATE reviews SET flagged = 1 WHERE review_id = :review_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['review_id'=>$this->review_id]);
		}

		public function getReview($review_id){
			$sql = "SELECT * From reviews Where review_id=:review_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['review_id' => $review_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Review");
			return $stmt->fetch();
		}

		public function getAllReviews(){
			$sql = "SELECT * FROM reviews Where flagged = 1";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Review");
			return $stmt->fetchAll();
		}

		public function getCustomerReview($customer_id){
			$sql = "SELECT * From reviews Where customer_id=:customer_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['customer_id' => $customer_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Review");
			return $stmt->fetch();
		}
                
                public function getNonFlaguedReviews(){
                    $sql = "SELECT r.review_id, comment, r.customer_id, r.flagged, cu.first_name, cu.last_name FROM reviews r
join customers cu on r.customer_id = cu.customer_id
WHERE r.flagged = 0";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute();

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Review");
			return $stmt->fetchAll();
                    
                }
	}
?>