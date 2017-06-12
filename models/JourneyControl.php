<?php
	namespace travels\models;
	use travels\dataBase as dataBase;
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
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE 1");

		    return $query;
		}

		function getTripByJourneyID($journeyID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT tripID, destination FROM journeys WHERE journeyID = '$journeyID'");
			return $query;
		}
		
		function getDestinationByJourneyIDandTripID($journeyID,$tripID){		
			$dbManager = dataBase\DBManager::getInstance();		
			$connection = $dbManager->getConnection();		
			$query = $connection->query("SELECT destination FROM journeys WHERE journeyID = '$journeyID' and tripID = '$tripID'");		
			return $query;		
		}

		function getJourneysByOrigin($origin){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE origin = '$origin'");

		    return $query;
		}

		function getJourneysByOriginAndDate($origin, $dateStart, $dateEnd){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE origin = '$origin' AND departureDate >= '$dateStart' AND departureDate < '$dateEnd'");

		    return $query;
		}

		function getJourneysByTripAndDest($tripID, $destination){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE (tripID = '$tripID') AND (destination = '$destination')");

		    return $query;
		}

		function getJourneysByTrip($tripID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE tripID = '$tripID'");

		    return $query;
		}
		
		function getJourneyInfoByTripIDandJourneyID($tripID,$journeyID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM Journeys WHERE tripID = '$tripID' AND journeyID = '$journeyID'");

		    return $query;
		}
		
		function getJourneysByPassenger($username){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM JourneyPassengers WHERE username = '$username'");

		    return $query;
		}
		
		function getJourneysByDriver($username){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE tripID IN (SELECT tripID FROM trips WHERE driverUsername = '$username')");

		    return $query;
		}

		function insertJourney($tripID, $journeyID, $departureDate, $arrivalDate, $price, $nSeats, $origin, $destination){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			
			$result = $connection->query("INSERT INTO journeys(tripID, journeyID, departureDate, arrivalDate, price, nSeats, origin, destination) VALUES ('$tripID', '$journeyID', '$departureDate', '$arrivalDate', '$price', '$nSeats', '$origin', '$destination')");
		}
		
		function getJourneysIDbyOriginAndTrip($origin, $tripID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT journeyID FROM journeys WHERE (origin = '$origin') AND (tripID = '$tripID')");

			return $query;
		}

		function getJourneysDatabyJourneyAndTrip($journeyID, $tripID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE (journeyID >= '$journeyID') AND (tripID = '$tripID')");

			return $query;
		}
		
		function getJourneyDatabyJourneyAndTrip($journeyID, $tripID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT * FROM journeys WHERE (journeyID = '$journeyID') AND (tripID = '$tripID')");

		    return $query;
		}

		
		function updateJourney($tripID, $journeyID, $price, $nSeats){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("UPDATE journeys SET price = '$price', nSeats = '$nSeats' WHERE tripID = '$tripID' AND journeyID = '$journeyID'");
			
			return $query;
		}

	}
?>


			

