<?php
	namespace travels\models;
	use travels\dataBase as dataBase;
	include_once "../dataBase/DBManager.php";


	class UserControl{
		private static $instance;

		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		function getUserByUserName($username){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();	
			$query = $connection->query("SELECT username, name, dni, email, phone, photo FROM users WHERE username = '$username'");
			return $query;
		}

		function getUsersDriver(){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username,name,dni,email,phone,photo FROM users WHERE rol = '1' ");
		    return $query;
		}


		function getUsersPassenger(){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username,name,dni,email,phone,photo FROM users WHERE rol = '0' ");
		    return $query;
		}
		
		function getUsersTrip($tripID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT name,photo FROM users WHERE username IN (SELECT username FROM journeypassengers WHERE tripID = '$tripID') ");
		    return $query;
		}
		
		function getUsersTripJourney($tripID, $journeyID){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT name,photo FROM users WHERE username IN (SELECT username FROM journeypassengers WHERE tripID = '$tripID' AND journeyID = '$journeyID') ");
		    return $query;
		}

		function deleteUserDyUsername($username){
			$dbManager = dataBase\DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("DELETE FROM users  WHERE username = '$username'");
		}
	}
?>