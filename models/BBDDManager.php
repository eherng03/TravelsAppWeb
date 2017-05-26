<?php
	class BBDDManager{
		private static $instance;
		private static $connection;

		private function __construct(){
			$this->openConnectionBBDD();
		}

		public static function getInstance(){
			if (  !self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

		function openConnectionBBDD(){
			//TODO the conection
		}
	}
?>
