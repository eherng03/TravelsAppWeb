<?php
    namespace travels\operations;
    use travels\models as models;
    use travels\objects as objects;
    include "../models/TripControl.php";
    include "../objects/Trip.php";
	include "../models/JourneyControl.php";
	include "../models/JourneyPassengersControl.php";
    
    //acceso a la BBDD
    $tripControl = models\TripControl::getInstance();
	$journeyControl = models\JourneyControl::getInstance();
	$journeyPassControl = models\JourneyPassengersControl::getInstance();
	
	$trips = array();
	$cancel = array();
	$tripQuery = $tripControl->getTripInfoByDriverToCancel($_GET['username']);	
	while ($row = $tripQuery->fetch_array()){
		$tripID = $row['tripID'];
		$t = new objects\Trip($row['origin'], $row['destination'], $row['driverUsername']);
		$t->setTripID($tripID);
        array_push($trips, $t);
		
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