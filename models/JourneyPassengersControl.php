
<?php
	include_once "../dataBase/DBManager.php";


	class JourneyPassengersControl{
		private static $instance;

		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

		function getPassengers($journey,$userLog){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username FROM journeypassengers WHERE journeyID = '$journey' AND NOT username = '$userLog'");
			return $query;
		}


		function getJourneysByUser($userLog){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT journeyID FROM journeypassengers WHERE username = '$userLog'");
			return $query;
		}

		function getUsersByJourneys($journey){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username FROM journeypassengers WHERE journeyID = '$journey'");
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


