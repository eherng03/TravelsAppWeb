<?php
	require "../objects/Trip.php";
	use PHPUnit\Framework\TestCase;

	class TripTest extends TestCase
	{
		public function testTrip()
		{
			$trip = new Trip("Leon", "Madrid", "Luis");
			$this->assertEquals("Leon", $trip->origin);
			$this->assertEquals("Madrid", $trip->destination);
		}
	}
?>