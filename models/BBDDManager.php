<?php
	class BBDDManager{
		private static $instance;
		private static $connection;
		
		private $host = 'sql11.freemysqlhosting.net';
		private $user = 'sql11176712';
		private $pass = 'xKr66u4JUh';
		private $db = 'sql11176712';
		private $conn = null;

		private function __construct(){
			$this->openConnectionBBDD();
			$this->testDB();
		}

		public static function getInstance(){
			if (  !self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

		function openConnectionBBDD(){
			$this->instance = new mysqli($this->host,$this->user,$this->pass);
			if($this->instance->connect_errno){
			  die('Connection error' . $this->instance->connect_error);
			}
			$this->instance->select_db($this->db);
		}
		
	}
?>
