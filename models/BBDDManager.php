<?php
	class BBDDManager{
		private static $instance;
		private static $conexion;

		private function __construct(){
			$this->openConectionBBDD();
		}

		public static function getInstance(){
			if (  !self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

		function openConectionBBDD(){
			//TODO the conection
		}
	}
?>
