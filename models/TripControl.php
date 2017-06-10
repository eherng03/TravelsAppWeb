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
		
		function insertTrip($driverID, $origin, $destination){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("INSERT INTO trips(driverUsername, origin, destination) VALUES ('$driverID' ,'$origin','$destination')");
			
			$result = $connection->query("SELECT tripID FROM trips WHERE (driverUsername = '$driverID') AND (origin = '$origin') AND  (destination = '$destination')");

			return $result;		//Devuelve el ultimo elemento (creo)
		}
	}
?>
