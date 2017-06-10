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

		public function getDriverByID($trip){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT driverUsername FROM trips WHERE tripID = '$trip'");
			return $query;
		}
		
		function getTripInfoByID($tripID){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT * FROM trips WHERE tripID = '$tripID'");
			return $query;
		}

		function getTripByDriver($driverID){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT tripID, destination FROM trips WHERE driverUsername = '$driverID'");
			return $query;
		}
		
		function getTripInfoByDriver($driverID){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT * FROM trips WHERE driverUsername = '$driverID'");
			return $query;
		}
		
		function getTripsToCancel($driverID){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT * FROM trips WHERE tripID = (SELECT tripID FROM journeys WHERE ");
			return $query;
		}
		
		function getTripsToDelete($driverID){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT * FROM trips WHERE driverUsername = '$driverID'");
			return $query;
		}

	}
?>