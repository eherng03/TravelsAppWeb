<?php
//TRAYECTO
	class Journey{ 
		private $tripID;		//??	Hay que saber a que viaje pertenece de alguna manera para obteer el conductor
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

		


	}
?>