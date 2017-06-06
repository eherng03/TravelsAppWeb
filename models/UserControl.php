<?php
	include "../dataBase/DBManager.php";


	class UserControl{
		private static $instance;

		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}
		
		function getPassengersInfo($username){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username, name, dni, email, phone, photo FROM users WHERE username = '$username'");
			return $query;
		}

		function getLogInfo($userLog){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username, name, dni, email, phone, photo FROM users WHERE username = '$userLog'");
			return $query;
		}

		function getUsersDriver(){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username,name,dni,email,phone,photo FROM Users WHERE rol = '1' ");
		    return $query;
		}


		function getUsersPassenger(){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username,name,dni,email,phone,photo FROM Users WHERE rol = '0' ");
		    return $query;
		}

		function deleteUserDyUsername($username){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("DELETE FROM Users  WHERE username = '$username' ");
		}
	}
?>