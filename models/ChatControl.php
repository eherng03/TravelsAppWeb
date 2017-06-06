<?php
	include "../dataBase/DBManager.php";
	class ChatControl{
		private static $instance;
		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

	function getJourneys($userLog){
		$dbManager = DBManager::getInstance();
		$connection = $dbManager->getConnection();
		$query = $connection->query("SELECT journeyID FROM journeypassengers WHERE username = '$userLog'");
		return $query;
	}

	function getPassengers($journey,$userLog){
		$dbManager = DBManager::getInstance();
		$connection = $dbManager->getConnection();
		$query = $connection->query("SELECT username FROM journeypassengers WHERE journeyID = '$journey' AND NOT username = '$userLog'");
		return $query;
	}

	function getPassengersInfo($username){
		$dbManager = DBManager::getInstance();
		$connection = $dbManager->getConnection();
		$query = $connection->query("SELECT username, name, dni, email, phone, photo FROM users WHERE username = '$username'");
		return $query;
	}

	function getTrip($journey){
		$dbManager = DBManager::getInstance();
		$connection = $dbManager->getConnection();
		$query = $connection->query("SELECT tripID FROM journeys WHERE journeyID = '$journey'");
		return $query;
	}

	function getDriver($trip){
		$dbManager = DBManager::getInstance();
		$connection = $dbManager->getConnection();
		$query = $connection->query("SELECT driverUsername FROM trips WHERE tripID = '$trip'");
		return $query;
	}

	function getMessages($user1,$user2){
		$dbManager = DBManager::getInstance();
		$connection = $dbManager->getConnection();
		$query = $connection->query("SELECT user1,user2,hour,msg FROM chats WHERE user1 = '$user1' AND user2 ='$user2' OR  user1 = '$user2' AND user2 ='$user1'");
		return $query;
	}

	function getLogInfo($userLog){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
		$query = $connection->query("SELECT username, name, dni, email, phone, photo FROM users WHERE username = '$userLog'");
		return $query;
		}
		
	function setMessage($user1,$user2,$hour,$msg){
		$dbManager = DBManager::getInstance();
		$connection = $dbManager->getConnection();
		$query = $connection->query("INSERT INTO Chats (user1, user2, hour, msg)
        	 VALUES ('$user1','$user2', '$hour', '$msg')");
	   return $query;
	}
}
	
?>