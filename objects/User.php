<?php
	class User{
		public $name;
		public $email;
		public $user;
		public $telephone;
		public $dni;
		public $photo;
		
		public function __construct($name, $email, $user, $telephone, $dni, $photo){
			$this->name = $name;
			$this->email = $email;
			$this->user = $user;
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