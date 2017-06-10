<?php
	include "../models/JourneyPassengersControl.php";

	$idTrip = $_POST['idTrip'];
	$idsJourneyString = $_POST['idsJourneys'];
	//$idTrip = 1;
	//$idsJourneyString = "1 2 ";
	$idsJourneys = split("[ ]+", $idsJourneyString);
	array_pop($idsJourneys);
	$username = $_POST['userName'];
	//$username = "alba";
	$journeyPassengersControl = JourneyPassengersControl::getInstance();
	foreach ($idsJourneys as $idJourney) {
		$journeyPassengersControl->insertPassenger($idTrip, $idJourney, $username);
	}
	
?>