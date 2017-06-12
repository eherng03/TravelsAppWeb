<?php
	namespace travels\operations;
	use travels\models as models;
	use travels\templates as templates;
	use travels\objects as objects;
    include "../models/JourneyControl.php";
    include "../objects/Journey.php";
	include "../templates/TemplateJourney.php";
	include "../models/TripControl.php";
	include "../models/UserControl.php";
	include "../objects/Driver.php";
    
    //acceso a la BBDD
    $journeyControl = models\JourneyControl::getInstance();
	$templateJourney = templates\TemplateJourney::getInstance();
	$userControl = models\UserControl::getInstance();
	$tripControl = models\TripControl::getInstance();
	
	$templateshtml = "";
    $journeysQuery = $journeyControl->getJourneysByPassenger($_POST['username']);      
    while ($row = $journeysQuery->fetch_array()){
		$tripID = $row['tripID'];
		$jID = $row['journeyID'];

		$tripControl = models\TripControl::getInstance();
    	$tripInfo = $tripControl->getTripInfoByID($tripID);
    	while($rowTripInfo = $tripInfo->fetch_array()){
    		$cancelled = $rowTripInfo['cancelled'];
    	}
		
		$journeyQuery2 = $journeyControl->getJourneyInfoByTripIDandJourneyID($tripID,$jID);
        while ($row2 = $journeyQuery2->fetch_array()){
			$j = new objects\Journey($row2['tripID'], $row2['journeyID'], $row2['departureDate'], $row2['arrivalDate'], $row2['origin'], $row2['destination'], $row2['nSeats'], $row2['price']);
			
			//Obtener driverUsername 
			$driverUsernameQuery = $tripControl->getDriverUsername($row['tripID']);
			while($rowDriverUsername = $driverUsernameQuery->fetch_array()){
				$driverUsername = $rowDriverUsername['driverUsername'];
			}
		
			$driverData = $userControl->getUserByUserName($driverUsername);
		
			$driver = null;		
			while($rowDriverData = $driverData->fetch_array()){
				$driver = new objects\Driver($rowDriverData['name'], $rowDriverData['email'], $rowDriverData['username'], $rowDriverData['phone'], $rowDriverData['dni'], $rowDriverData['photo']);
			}
		
			$templateshtml .= $templateJourney->getTemplate($driver, $j, "reserved", $cancelled);
		}
    }
	
	echo $templateshtml;
?>
