<?php
	namespace travels\models;
	use travels\dataBase as dataBase;
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
		   $dbManager = dataBase\DBManager::getInstance();
		   $connection = $dbManager->getConnection();
		   $query = $connection->query("SELECT driverUsername FROM trips WHERE tripID = '$tripID'");
		   return $query;
	  	}

		public function getDriverByID($trip){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT driverUsername FROM trips WHERE tripID = '$trip'");
			return $query;
		}
	  
		function getTripInfoByID($tripID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT * FROM trips WHERE tripID = '$tripID'");
			return $query;
		}

		function getTripByDriver($driverID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT tripID, destination FROM trips WHERE driverUsername = '$driverID'");
			return $query;
		}
	  
		function getTripInfoByDriver($driverID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT * FROM trips WHERE driverUsername = '$driverID'");
			return $query;
		}
		
		function getTripInfoByDriverToCancel($driverID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT * FROM trips WHERE driverUsername = '$driverID' AND cancelled = 0");
			return $query;
		}

//EVA
		function insertTrip($driverID, $origin, $destination){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("INSERT INTO trips(driverUsername, origin, destination) VALUES ('$driverID' ,'$origin','$destination')");

			$result = $connection->query("SELECT tripID FROM trips WHERE (driverUsername = '$driverID') AND (origin = '$origin') AND  (destination = '$destination')");

			return $result;		//Devuelve el ultimo elemento (creo)
		}
		
		function cancelTripByID($tripID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("UPDATE trips SET cancelled= 1 WHERE tripID = '$tripID'");
			
			return $query;
		}
		
		function deleteTripByID($tripID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("DELETE FROM trips  WHERE tripID = '$tripID'");
			
			return $query;
		}

	}
?>
