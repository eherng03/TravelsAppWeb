<?php
	class Driver{
		public $name;
		public $email;
		public $user;
		public $password;
		public $telephone;
		public $dni;
		public $photo;
		public $journeys;
		public $numberJourneys;
		public $scoreAverage;
		public $coments;

		public function __construct($name, $email, $user, $telephone, $dni, $photo){
			$this->name = $name;
			$this->email = $email;
			$this->user = $user;
			//$this->password = $password;
			$this->telephone = $telephone;
			$this->dni = $dni;
			$this->photo = $photo;
			//$this->journeys = array();
			//$this->numberJourneys = 0;
			//$this->scoreAverage = 0;
			//$this->coments = array();
		}

		//TODO here needed getters and setters

		//TODO other public functions

	}
?>