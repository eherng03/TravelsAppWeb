<?php
	include "../models/JourneyPassengersControl.php";

	$idTrip = $_POST['idTrip'];
	$idsJourneyString = $_POST['idsJourney'];
	$idsJourney = preg_split("[ ]", $idsJourneyString);
	array_pop($idsJourney);
	$username = $_POST['username'];
	$journeyPassengersControl = JourneyPassengersControl::getInstance();
	foreach ($idsJourney as $idJourney) {
		$journeyPassengersControl->insertPassenger($idTrip, $idJourney, $username);
	}
	
?>