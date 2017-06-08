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
		
		function getCommentsByUsername($driverUsername){
			$dbManager = DBManager::getInstance();
			$connection = $dbManager->getConnection();
			$query = $connection->query("SELECT comment, passUsername FROM drivercomments WHERE driverUsername = '$driverUsername' ");
			 return $query;
		}
	}
	
?>