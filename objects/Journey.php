<?php
//TRAYECTO
	class Journey{ 
		private $tripID;
		private $journeyID;
		public $origin;
		public $destination;
		private $departureDate;
		private $arrivalDate;
		private $seatsNumber;
		private $passengers;
		private $cost;

		public function __construct($tripID, $journeyID, $departureDate, $arrivalDate, $origin, $destination, $seatsNumber, $cost){
			$this->tripID = $tripID;
			$this->journeyID = $journeyID;
			$this->origin = $origin;
			$this->destination = $destination;
			$this->departureDate = $departureDate;			
			$this->arrivalDate = $arrivalDate;
			$this->seatsNumber = $seatsNumber;
			$this->passengers = array();
			$this->cost = $cost;
		}

		public function getDepartureDate(){
			return $departureDate;
		}

		public function getArrivalDate(){
			return $arrivalDate;
		}
		


	}
?>