<?php
//TRAYECTO
	class Journey{ 
		//private $tripID;??	Hay que saber a que viaje pertenece de alguna manera para obteer el conductor
		private $source;
		private $destination;
		private $initDate;
		private $seatsNumber;
		private $passengers;
		private $price;

		public function __construct($source, $destination, $initDate, $seatsNumber, $price){
			$this->source = $source;
			$this->destinations = $destination;
			$this->initDate = $initDate;
			$this->seatsNumber = $seatsNumber;
			$this->passengers = array();
			$this->price = $price;
		}

		//TODO here needed getters and setters

		//TODO addPassenger and check the number of free sits

	}
?>
