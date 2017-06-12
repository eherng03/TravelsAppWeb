<?php
	namespace travels\objects;
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
		public $comments;

		public function __construct($name, $email, $user, $telephone, $dni, $photo){
			$this->name = $name;
			$this->email = $email;
			$this->user = $user;
			$this->telephone = $telephone;
			$this->dni = $dni;
			$this->photo = $photo;
			$this->score = 0;
			$this->comemnts = array();
		}

		//TODO here needed getters and setters

		//TODO other public functions
		
		public function getScoreAverage(){
			return $this->scoreAverage;
		}

	}

?>