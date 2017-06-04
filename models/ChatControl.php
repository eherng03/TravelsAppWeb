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

		function getNChats($userLog){

			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT DISTINCT user1,user2,hour,msg FROM Chats WHERE user1 = '$userLog' group by user2");

			
			return $query;

		}

		function getUser($user2){

			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("SELECT username,email,name,phone,dni,photo FROM Users WHERE username = '$user2'");
			return $query;
		}

		function getChatMessages($user1,$user2){

			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();


			$query = $connection->query("SELECT user1,user2,hour,msg FROM Chats WHERE user1 = '$user1' AND user2 ='$user2' OR  user1 = '$user2' AND user2 ='$user1'");

			return $query;
		}

		function setChatMessages($user1,$user2,$hour,$msg){

			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();

			$query = $connection->query("INSERT INTO Chats (user1, user2, hour, msg)
	        	 VALUES ('$user1','$user2', '$hour', '$msg')");
		   return $query;
		}

	}
	


?>