
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

		function getPassengers($tripID,$journey,$userLog){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username FROM journeypassengers WHERE (journeyID = '$journey') AND (tripID = '$tripID') AND (NOT username = '$userLog')");
			return $query;
		}


		function getJourneysAndTripIDByUser($userLog){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT tripID, journeyID FROM journeypassengers WHERE username = '$userLog'");
			return $query;
		}

		function getUsersByJourneys($journey){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT DISTINCT  username FROM journeypassengers WHERE tripID = '$journey'");
			return $query;
		}
			
		function insertPassenger($idTrip, $idJourney, $username){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("INSERT INTO journeypassengers(tripID, journeyID, username) VALUES ('$idTrip','$idJourney','$username')");
		}
		
		function cancelJourney($idTrip, $idJourney, $username){		
			$dbManager = DBManager::getInstance();		
			$connection = $dbManager->getConnection();		
			$query = $connection->query("DELETE FROM journeypassengers WHERE (tripID = '$idTrip') AND (journeyID = '$idJourney') AND (username = '$username')");		
		}
	}
?>


