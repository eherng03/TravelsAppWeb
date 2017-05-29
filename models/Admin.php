<?php
	class Admin{
		private static $instance;
		private $user;
		private $password;
		private $passengers;
		private $drivers;

		private function __construct(){
			$this->user = "admin";
			$this->password = "admin";
			$passengers = array();
			$drivers = array();
		}

		public static function getInstance(){
			if (  !self::$instance instanceof self){
				self::$instance = new self;
			}
			return self::$instance;
		}

		public addPassenger($passenger){
			array_push($passengers, $passenger);
		}

		public addPassenger($driver){
			array_push($drivers, $driver);
		}

		
		public deletePassenger($passenger){
			//TODO
		}

		public deleteDriver($passenger){
			//TODO
		}
	}
?>