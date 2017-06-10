<?php
	include_once "../dataBase/DBManager.php";


	class TripControl{

		private static $instance;

		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

		function getDriverUsername($tripID){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT driverUsername FROM trips WHERE tripID = '$tripID'");
			return $query;
		}
	}
?>