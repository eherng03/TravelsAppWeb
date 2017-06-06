<?php
//TRAYECTO
	class Journey{ 
		private $tripID;		//??	Hay que saber a que viaje pertenece de alguna manera para obteer el conductor
		private $journeyID;
		public $origin;
		public $destination;
		private $departureHour;
		private $departureDate;
		private $arrivaleHour;
		private $arrivalDate;
		private $seatsNumber;
		private $passengers;
		private $cost;

		public function __construct($tripID, $journeyID, $departureHour, $departureDate, $arrivaleHour, $arrivalDate, $origin, $destination, $seatsNumber, $cost){
			$this->tripID = $tripID;
			$this->journeyID = $journeyID;
			$this->origin = $origin;
			$this->destination = $destination;
			$this->departureHour = $departureHour;
			$this->departureDate = $departureHour;
			$this->arrivaleHour = $departureHour;
			$this->arrivalDate = $departureHour;
			$this->seatsNumber = $seatsNumber;
			$this->passengers = array();
			$this->cost = $cost;
		}


	}
?>
