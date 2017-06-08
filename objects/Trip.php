<?php
	class Trip{ 
		private $origin;
		private $destination;
		private $driverUsername; 
		private $cancelled; //??
		private $price;
		private $journeys;
		private $initDate;

		public function __construct($origin, $destination, $driverUsername){
			$this->origin = $origin;
			$this->destination = $destination;
			$this->driverUsername = $driverUsername;
			$this->journeys = array();
			$this->price = 0;
		}

		//TODO here needed getters and setters
		function addJourney($journey){
			array_push($this->journeys, $journey);
			
		}
	}
?>