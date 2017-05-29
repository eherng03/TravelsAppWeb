<?php
	class Journey{
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
		public function addPassenger($passenger){
			if(sizeof($passengers) < $seatsNumber){
				array_push($passengers, $passenger);
				//TODO meter en la bbdd
			}else{
				//TODO no se puede meter
			}
		}

	}
?>