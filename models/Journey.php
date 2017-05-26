<?php
	class Journey{
		private $source;
		private $destinations;
		private $initDate;
		private $sitsNumber;
		private $passengers;

		public function __construct($source, $destinations, $initDate, $sitsNumber){
			$this->source = $source;
			$this->destinations = $destinations;
			$this->initDate = $initDate;
			$this->sitsNumber = $sitsNumber;
			$this->passengers = array();
		}

		//TODO here needed getters and setters

		//TODO addPassenger and check the number of free sits

	}
?>