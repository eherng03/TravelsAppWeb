<?php
	include "../dataBase/DBManager.php";


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
	}
?>


			

