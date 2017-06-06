<?php
	class Trip{ 
		private $origin;
		private $destination;
		private $driverUsername; 
		private $cancelled; //??
		private $price;
		private $journeys;
		private $initDate;
		private $initHour;

		public function __construct($origin, $destination, $driverUsername, $price){
			$this->origin = $origin;
			$this->destination = $destination;
			$this->driverUsername = $driverUsername;
			$this->journeys = array();
			$this->price = $price;
		}

		//TODO here needed getters and setters
	}
?>