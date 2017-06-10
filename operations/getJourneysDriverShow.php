<?php
    include "../models/JourneyControl.php";
    include "../objects/Journey.php";
	include "../templates/TemplateJourney.php";
	include "../models/TripControl.php";
	include "../models/UserControl.php";
	include "../objects/Driver.php";
	include "../objects/Trip.php";

	$journeyControl = JourneyControl::getInstance();
	$templateJourney = TemplateJourney::getInstance();
	$userControl = UserControl::getInstance();
	$tripControl = TripControl::getInstance();	

    $journeysQuery = $journeyControl->getJourneysByDriver($_POST['username']);

	$templateshtml = "";
    while ($row = $journeysQuery->fetch_array()){
        $j = new Journey($row['tripID'], $row['journeyID'], $row['departureDate'], $row['arrivalDate'], $row['origin'], $row['destination'], $row['nSeats'], $row['price']);

		$tripControl = TripControl::getInstance();
    	$tripInfo = $tripControl->getTripInfoByID($row['tripID']);
    	while($rowTripInfo = $tripInfo->fetch_array()){
    		$cancelled = $rowTripInfo['cancelled'];
    	}

		$tripQuery = $tripControl->getTripInfoByID($row['tripID']);
		$trip = null;
		while ($row1 = $tripQuery->fetch_array()){
			$trip = new Trip($row1['origin'], $row1['destination'], $row1['driverUsername']);
		}
		$templateshtml .= $templateJourney->getTemplateForDriver($j, $trip, $cancelled);
    }
	
	echo $templateshtml;

?>