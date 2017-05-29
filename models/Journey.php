<?php
	class Journey{ //IDENTIFICADOR?
		private $source;
		private $destinations;
		private $initDate;
		private $seatsNumber;
		private $passengers;

		public function __construct($source, $destinations, $initDate, $seatsNumber){
			$this->source = $source;
			$this->destinations = $destinations;
			$this->initDate = $initDate;
			$this->seatsNumber = $seatsNumber;
			$this->passengers = array();
		}

		//TODO here needed getters and setters

		//TODO addPassenger and check the number of free sits

	}
?>