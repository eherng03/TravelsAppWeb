<?php
	class Coment{
		private $comentID;
		private $driverUserName;
		private $passUserName;
		private $coment;
		private $score;
		
		public function __construct($comentID, $driverUserName, $passUserName, $coment, $score){
			$this->comentID = $comentID;
			$this->driverUserName = $driverUserName;
			$this->passUserName = $passUserName;
			$this->coment = $coment;
			$this->score = $score;
		}
	}