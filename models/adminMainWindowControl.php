<?php
	include "../dataBase/DBManager.php";


	class AdminMainWimdowControl{

		private static $instance;

		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

		function getDriver(){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT username,name,dni,email,phone,photo FROM Users WHERE rol = '1' ");

		    return $query;

		}

		function getPassenger(){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT username,name,dni,email,phone,photo FROM Users WHERE rol = '0' ");

		    return $query;

		}

		function deleteUser($username){

			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("DELETE FROM Users  WHERE username = '$username' ");


		}


	}
	


?>