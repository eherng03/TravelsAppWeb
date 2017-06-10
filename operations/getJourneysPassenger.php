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
	$tripControl = TripControl::getInstance();
	
	$templateshtml = "";
    $journeysQuery = $journeyControl->getJourneysByPassenger($_POST['username']);      
    while ($row = $journeysQuery->fetch_array()){
		$tripID = $row['tripID'];
		$jID = $row['journeyID'];
		
		$journeyQuery2 = $journeyControl->getJourneyInfoByTripIDandJourneyID($tripID,$jID);
        while ($row2 = $journeyQuery2->fetch_array()){
			$j = new Journey($row2['tripID'], $row2['journeyID'], $row2['departureDate'], $row2['arrivalDate'], $row2['origin'], $row2['destination'], $row2['nSeats'], $row2['price']);
		
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
		
			$templateshtml .= $templateJourney->getTemplate($driver, $j, "reserved");
		}
    }
	
	echo $templateshtml;
?>
