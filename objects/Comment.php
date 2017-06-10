<?php
	class Comment{
		private $commentID;
		private $driverUserName;
		private $passUserName;
		private $comment;
		private $score;
		
		public function __construct($commentID, $driverUserName, $passUserName, $comment, $score){
			$this->commentID = $commentID;
			$this->driverUserName = $driverUserName;
			$this->passUserName = $passUserName;
			$this->comment = $comment;
			$this->score = $score;
		}


		public function getPassUserName(){
			return $this->passUserName;
		}

		public function getComment(){
			return $this->comment;
		}

		public function getScore(){
			return $this->score;
		}
	}