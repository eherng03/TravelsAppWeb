<?php
 	use travels\objects as objects;
 	use PHPUnit\Framework\TestCase;
	include "../objects/Trip.php";

	class TripTest extends TestCase
	{
		public function testTrip()
		{
			$trip = new objects\Trip("Leon", "Madrid", "Luis");
			$this->assertEquals("Leon", $trip->origin);
			$this->assertEquals("Madrid", $trip->destination);
		}
	}
?>