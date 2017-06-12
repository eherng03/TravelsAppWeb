<?php
use travels\dataBase as dataBase;
	include_once "../dataBase/DBManager.php";


	class DriverControl{
		private static $instance;

		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}


		function getScoreAverage($userLog){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT score FROM drivers WHERE username = '$userLog' ");
			 return $query;
		}

	}
?>