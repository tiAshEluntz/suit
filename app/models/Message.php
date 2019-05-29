<?php 
	Class Message extends Model{

		var $message_id;
		var $username;
		var $ticket_id;
		var $message;
		var $read_status;

		public function __construct(){
			parent:: __construct();
		}

		public function insert(){
			$sql = "INSERT INTO messages (username, ticket_id, message, read_status) VALUES (:username, :ticket_id, :message, :read_status)";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['username' => $this->username, 'ticket_id'=>$this->ticket_id, 'message'=>$this->message, 'read_status'=>$this->read_status]);
		}

		public function remove(){
			$sql = "DELETE FROM messages WHERE message_id = :message_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['message_id'=>$this->message_id]);
		}

		public function updateReadStatus(){
			$sql = "UPDATE messages SET read_status = :read_status WHERE ticket_id = :ticket_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['read_status'=>$this->read_status, 'ticket_id'=>$this->ticket_id]);
		}

		public function getMessage($message_id){
			$sql = "SELECT * FROM messages WHERE message_id=:message_id";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['message_id' => $message_id]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Message");
			return $stmt->fetch();
		}
                
                public function getUnreadMessage($username){
                    
                    $sql = "select c.customer_id, m.message_id, m.username, m.ticket_id, m.message, m.read_status, t.subject from messages m
join customers c on c.username = m.username join tickets t on t.ticket_id = m.ticket_id
where m.username = :username and m.read_status = 1";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['username' => $username]);

			$stmt->setFetchMode(PDO::FETCH_CLASS, "Message");
			return $stmt->fetchAll();
                }
                
                
                public function setRead(){
			$sql = "UPDATE messages SET read_status = 0 WHERE message_id = :message_id";
			$sth = self::$_connection->prepare($sql);
			$sth->execute(['message_id'=>$this->message_id]);
		}
	}
?>