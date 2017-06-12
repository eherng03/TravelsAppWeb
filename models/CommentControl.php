<?php
	include_once "../dataBase/DBManager.php";
	
	class CommentControl{
		private static $instance;
		private function __construct(){}
		
		public static function getInstance(){
			if (!self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}
		//Este no saca la puntuacion
		function getCommentsByUsername($driverUsername){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT comment, passUsername FROM drivercomments WHERE driverUsername = '$driverUsername' ");
			 return $query;
		}

		//Saca toda la fila
		function getComments($userLog){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT driverUsername, passUsername, comment, score, commentID FROM drivercomments WHERE driverUsername = '$userLog' ");
			 return $query;
		}

		//Saca toda la fila
		function setScore($driverUsername,$passUsername,$comment,$score){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("INSERT INTO drivercomments (driverUsername, passUsername, comment, score) VALUES ('$driverUsername','$passUsername','$comment','$score') ");
			 return $query;
		}
	}
	
?>