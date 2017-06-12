
<?php
	use travels\dataBase as dataBase;
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
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username FROM journeypassengers WHERE (journeyID = '$journey') AND (tripID = '$tripID') AND (NOT username = '$userLog')");
			return $query;
		}
		
		function getNumPassengersByTripAndJourneyID($tripID, $journeyID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$rowcount = 0;
			if ($result=mysqli_query($connection,"SELECT username FROM journeypassengers WHERE (journeyID = '$journeyID') AND (tripID = '$tripID')")){
  				$rowcount=mysqli_num_rows($result);
  			}
			return $rowcount;
		}

		function getJourneysAndTripIDByUser($userLog){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT tripID, journeyID FROM journeypassengers WHERE username = '$userLog'");
			return $query;
		}

		function getUsersByJourneys($journey){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT DISTINCT  username FROM journeypassengers WHERE tripID = '$journey'");
			return $query;
		}
			
		function insertPassenger($idTrip, $idJourney, $username){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("INSERT INTO journeypassengers(tripID, journeyID, username) VALUES ('$idTrip','$idJourney','$username')");
		}
		
		function cancelJourney($idTrip, $idJourney, $username){		
			$dbManager = dataBase\DBManager::getInstance();		
			$connection = $dbManager->getConnection();		
			$query = $connection->query("DELETE FROM journeypassengers WHERE (tripID = '$idTrip') AND (journeyID = '$idJourney') AND (username = '$username')");		
		}
	}
?>


