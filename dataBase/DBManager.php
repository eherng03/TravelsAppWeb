<?php
	class DBManager{
		private static $instance;
		private $connection;
		
		private $host = 'sql11.freemysqlhosting.net';
		private $user = 'sql11176712';
		private $pass = 'xKr66u4JUh';
		private $db = 'sql11176712';
		private $conn = null;
		
		private function __construct(){
			$this->openConnectionDB();
		}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		function openConnectionDB(){
			$this->connection = new mysqli($this->host,$this->user,$this->pass);
			if($this->connection->connect_errno){
			  die('Connection error' . $this->connection->connect_error);
			}
			$this->connection->select_db($this->db);
		}
		
		public function getConnection(){
			return $this->connection;
		}
		
	}
?>