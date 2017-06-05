<?php
//TRAYECTO
	class Journey{ 
		//private $tripID;??	Hay que saber a que viaje pertenece de alguna manera para obteer el conductor
		private $source;
		private $destinations;
		private $initDate;
		private $seatsNumber;
		private $passengers;
		private $cost;

		public function __construct($source, $destinations, $initDate, $seatsNumber, $cost){
			$this->source = $source;
			$this->destinations = $destinations;
			$this->initDate = $initDate;
			$this->seatsNumber = $seatsNumber;
			$this->passengers = array();
			$this->cost = $cost;
		}

		//TODO here needed getters and setters

		//TODO addPassenger and check the number of free sits

	}
?>