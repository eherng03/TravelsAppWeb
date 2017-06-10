<?php
	include "../models/JourneyPassengersControl.php";
	echo "primero";
	$idTrip = $_POST['idTrip'];
	$idJourney = $_POST['idJourney'];
	$username = $_POST['username'];
	$journeyPassengersControl = JourneyPassengersControl::getInstance();
	$journeyPassengersControl->cancelJourney($idTrip, $idJourney, $username);
	print_r("llega");
?>