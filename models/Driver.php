<?php
	class Driver{
		private $name;
		private $email;
		private $user;
		private $password;
		private $telephone;
		private $dni;
		private $photo;
		private $journeys;
		private $numberJourneys;
		private $scoreAverage;
		private $coments;

		public function __construct($name, $email, $user, $password, $telephone, $dni, $photo){
			$this->name = $name;
			$this->email = $email;
			$this->user = $user;
			$this->password = $password;
			$this->telephone = $telephone;
			$this->dni = $dni;
			$this->photo = $photo;
			$this->journeys = array();
			$this->numberJourneys = 0;
			$this->scoreAverage = 0;
			$this->coments = array();
		}

		//TODO here needed getters and setters

		//TODO other public functions

	}
?>