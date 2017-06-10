<?php
	include_once "../dataBase/DBManager.php";


	class JourneyControl{
		private static $instance;

		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

		function getJourneys(){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE 1");

		    return $query;
		}

		function getTripByJourneyID($journeyID){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT tripID, destination FROM journeys WHERE journeyID = '$journeyID'");
			return $query;
		}

		function getJourneysByOrigin($origin){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE origin = '$origin'");

		    return $query;
		}

		function getJourneysByTripAndDest($tripID, $destination){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE (tripID = '$tripID') AND (destination = '$destination')");

		    return $query;
		}

		function getJourneysByTrip($tripID){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE tripID = '$tripID'");

		    return $query;
		}
		
		function getJourneyInfoByTripIDandJourneyID($tripID,$journeyID){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM Journeys WHERE tripID = '$tripID' AND journeyID = '$journeyID'");

		    return $query;
		}
		
		function getJourneysByPassenger($username){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM JourneyPassengers WHERE username = '$username'");

		    return $query;
		}
		
		function getJourneysByDriver($username){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE tripID IN (SELECT tripID FROM trips WHERE driverUsername = '$username')");

		    return $query;
		}

		function insertJourney($tripID, $journeyID, $departureDate, $arrivalDate, $price, $nSeats, $origin, $destination){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			
			$result = $connection->query("INSERT INTO journeys(tripID, journeyID, departureDate, arrivalDate, price, nSeats, origin, destination) VALUES ('$tripID', '$journeyID', '$departureDate', '$arrivalDate', '$price', '$nSeats', '$origin', '$destination')");
		}
	}
?>


			

