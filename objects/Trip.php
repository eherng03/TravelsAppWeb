<?php
	class Trip{ 
		public $tripID;
		public $origin;
		public $destination;
		private $driverUsername; 
		private $cancelled; 
		private $price;
		private $journeys;
		private $initDate;
		private $arrivalDate; 
		private $seats;

		public function __construct($origin, $destination, $driverUsername){
			$this->origin = $origin;
			$this->destination = $destination;
			$this->driverUsername = $driverUsername;
			$this->journeys = array();
			$this->price = 0;
			$this->cancelled = 0;
		}

		public function addJourney($journey){
			array_push($this->journeys, $journey);
		}

		public function addPrice($price){
			$this->price += $price;
		}

		public function getOrigin(){
			return $this->origin;
		}

		public function getDestination(){
			return $this->destination;
		}

		public function getPrice(){
			return $this->price;
		}

		public function getSeats(){
			return $this->seats;
		}

		public function setArrivalDate($arrivalDate){
			$this->arrivalDate = $arrivalDate;
		}

		public function setInitDate($initDate){
			$this->initDate = $initDate;
		}


		public function setSeats($minNumberSeats){
			$this->seats = $minNumberSeats;
		}

		public function getArrivalDate(){
			return $this->arrivalDate;
		}

		public function getInitDate(){
			return $this->initDate;
		}

		public function getJourneys(){
			return $this->journeys;
		}
		
		public function setTripID($tripID){
			$this->tripID = $tripID;
		}
	}
?>