<?php
	class Trip{ 
		private $origin;
		private $destination;
		private $driverUsername; 
		private $cancelled; //??

		public function __construct($origin, $destination, $driverUsername){
			$this->origin = $origin;
			$this->destination = $destination;
			$this->driverUsername = $driverUsername;
		}

		//TODO here needed getters and setters
	}
?>