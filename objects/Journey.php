<?php
//TRAYECTO
	class Journey{ 
		public $tripID;
		private $journeyID;
		public $origin;
		public $destination;
		private $departureDate;
		private $arrivalDate;
		private $seats;
		private $passengers;
		private $price;

		public function __construct($tripID, $journeyID, $departureDate, $arrivalDate, $origin, $destination, $seats, $price){
			$this->tripID = $tripID;
			$this->journeyID = $journeyID;
			$this->origin = $origin;
			$this->destination = $destination;
			$this->departureDate = $departureDate;			
			$this->arrivalDate = $arrivalDate;
			$this->seats = $seats;
			$this->passengers = array();
			$this->price = $price;
		}

		public function getDepartureDate(){
			return $this->departureDate;
		}

		public function getArrivalDate(){
			return $this->arrivalDate;
		}
		
		public function getOrigin(){
			return $this->origin;
		}

		public function getDestination(){
			return $this->destination;
		}

		public function getPrice(){
			return $this->price;
		}

		public function getSeats(){
			return $this->seats;
		}
		
		public function getInitDate(){
			return $this->departureDate;
		}
		
		public function getID(){
			return $this->journeyID;
		}
 
		public function getTripID(){
			return $this->tripID;
		}

	}
?>
