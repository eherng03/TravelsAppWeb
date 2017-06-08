<?php
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
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();	
			$query = $connection->query("SELECT username, name, dni, email, phone, photo FROM users WHERE username = '$username'");
			return $query;
		}

		function getUsersDriver(){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username,name,dni,email,phone,photo FROM users WHERE rol = '1' ");
		    return $query;
		}


		function getUsersPassenger(){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT username,name,dni,email,phone,photo FROM users WHERE rol = '0' ");
		    return $query;
		}

		function deleteUserDyUsername($username){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("DELETE FROM users  WHERE username = '$username'");
		}
	}
?>