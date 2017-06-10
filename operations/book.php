<?php
	include "../models/JourneyPassengersControl.php";

	$idTrip = $_POST['idTrip'];
	$idsJourneyString = $_POST['idsJourney'];
	//$idTrip = 1;
	//$idsJourneyString = "1 2 ";
	$idsJourney = split("[ ]+", $idsJourneyString);
	array_pop($idsJourney);
	$username = $_POST['username'];
	//$username = "alba";
	print_r($username);
	print_r($idsJourney);
	print_r($idTrip);
	$journeyPassengersControl = JourneyPassengersControl::getInstance();
	foreach ($idsJourney as $idJourney) {
		$journeyPassengersControl->insertPassenger($idTrip, $idJourney, $username);
	}
	
?>