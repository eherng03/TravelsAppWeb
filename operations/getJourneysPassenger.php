<?php
    include "../models/JourneyControl.php";
    include "../objects/Journey.php";
	include "../templates/TemplateJourney.php";
	include "../models/TripControl.php";
	include "../models/UserControl.php";
	include "../objects/Driver.php";
    
    //acceso a la BBDD
    $journeyControl = JourneyControl::getInstance();
	$templateJourney = TemplateJourney::getInstance();
	$userControl = UserControl::getInstance();
	
    $journeysQuery = $journeyControl->getJourneysByPassenger($_POST['username']);      

	$tripControl = TripControl::getInstance();	

    $journeys = array();
	$templateshtml = "";
	$i = 0;
    while ($row = $journeysQuery->fetch_array()){
        array_push($journeys, new Journey($row['tripID'], $row['journeyID'], $row['departureDate'], $row['arrivalDate'], $row['origin'], $row['destination'], $row['nSeats'], $row['price']));
		
		//Obtener driverUsername 
		$driverUsernameQuery = $tripControl->getDriverUsername($row['tripID']);
		while($rowDriverUsername = $driverUsernameQuery->fetch_array()){
			$driverUsername = $rowDriverUsername['driverUsername'];
		}
		
		$driverData = $userControl->getUserByUserName($driverUsername);
		
		$driver = null;		
		while($rowDriverData = $driverData->fetch_array()){
			$driver = new Driver($rowDriverData['name'], $rowDriverData['email'], $rowDriverData['username'], $rowDriverData['phone'], $rowDriverData['dni'], $rowDriverData['photo']);
		}
		
		
		$templateshtml .= $templateJourney->getTemplate($driver, $journeys[$i]);
		$i += 1;
    }
	
	echo $templateshtml;
?>