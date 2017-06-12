<?php
	namespace travels\objects;
	class Passenger{
		public $name;
		public $email;
		public $user;
		public $password;
		public $telephone;
		public $dni;
		public $photo;
		public $journeys;

		public function __construct($name, $email, $user, $telephone, $dni, $photo){
			$this->name = $name;
			$this->email = $email;
			$this->user = $user;
			//$this->password = $password;
			$this->telephone = $telephone;
			$this->dni = $dni;
			$this->photo = $photo;
		}

		//TODO here needed getters and setters

		//TODO other public functions

	}
?>