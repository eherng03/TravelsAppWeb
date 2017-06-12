<?php
	namespace travels\models;
	use travels\dataBase as dataBase;
	include_once "../dataBase/DBManager.php";
	class ChatControl{
		private static $instance;
		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

	function getMessages($user1,$user2){
		$dbManager = dataBase\DBManager::getInstance();
		$connection = $dbManager->getConnection();
		$query = $connection->query("SELECT user1,user2,hour,msg FROM chats WHERE user1 = '$user1' AND user2 ='$user2' OR  user1 = '$user2' AND user2 ='$user1'");
		return $query;
	}
		
	function setMessage($user1,$user2,$hour,$msg){
		$dbManager = dataBase\DBManager::getInstance();
		$connection = $dbManager->getConnection();
		$query = $connection->query("INSERT INTO Chats (user1, user2, hour, msg)
        	 VALUES ('$user1','$user2', '$hour', '$msg')");
	   return $query;
	}
}
	
?>