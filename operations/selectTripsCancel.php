<?php
    include "../models/TripControl.php";
    include "../objects/Trip.php";
	include "../models/JourneyControl.php";
	include "../models/JourneyPassengersControl.php";
    
    //acceso a la BBDD
    $tripControl = TripControl::getInstance();
	$journeyControl = JourneyControl::getInstance();
	$journeyPassControl = JourneyPassengersControl::getInstance();
	
	$trips = array();
	$cancel = array();
	$tripQuery = $tripControl->getTripInfoByDriver($_GET['username']);	
	while ($row = $tripQuery->fetch_array()){
		$tripID = $row['tripID'];
        array_push($trips, new Trip($row['origin'], $row['destination'], $row['driverUsername']));
		
		$journeysQuery = $journeyControl->getJourneysByTrip($tripID);		
		while ($row2 = $journeysQuery->fetch_array()){
			$journeyID = $row2['journeyID'];
			
			$journeyPassQuery = $journeyPassControl->getUsersByJourneys($journeyID);			
			if($journeyPassQuery->num_rows > 0)
				array_push($cancel, true);
			else array_push($cancel, false);
		}
	}
	
    $result = array();

	for($i = 0; $i < count($trips); $i++){
		if($cancel[$i])
			array_push($result, $trips[$i]);
	}
    
    echo json_encode($result);
?>