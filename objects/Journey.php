<?php
//TRAYECTO
	class Journey{ 
		private $tripID;		//??	Hay que saber a que viaje pertenece de alguna manera para obteer el conductor
		private $source;
		private $destination;
		private $departureHour;
		private $departureDate;
		private $arrivaleHour;
		private $arrivalDate;
		private $seatsNumber;
		private $passengers;
		private $cost;

		public function __construct($departureHour, $departureDate, $arrivaleHour, $arrivalDate, $source, $destination, $seatsNumber, $cost){
			$this->source = $source;
			$this->destination = $destination;
			$this->departureHour;
			$this->departureDate;
			$this->arrivaleHour;
			$this->arrivalDate;
			$this->seatsNumber = $seatsNumber;
			$this->passengers = array();
			$this->cost = $cost;
		}

		//TODO here needed getters and setters

		//TODO addPassenger and check the number of free sits

	}
?>