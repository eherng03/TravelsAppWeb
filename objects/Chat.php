<?php
	namespace travels\objects;
	class Chat{
		public $user1;
		public $user2;
		public $hour;
		public $msg;

		
		public function __construct($user1, $user2, $hour, $msg){
			$this->user1 = $user1;
			$this->user2 = $user2;
			$this->hour = $hour;
			$this->msg = $msg;
		}

		//TODO here needed getters and setters

		//TODO other public functions

	}
?>