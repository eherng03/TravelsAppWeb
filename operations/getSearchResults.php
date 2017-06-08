<?php
	include "../models/JourneyControl.php";
	include "../models/TripControl.php";
	include "../models/UserControl.php";
    include "../objects/Journey.php";
    include "../objects/Trip.php";
    include "../objects/Driver.php";
    include "../templates/TemplateJourney.php";
    
    $origin = $_POST['origin'];
   	$destination = $_POST['destination'];

    //acceso a la BBDD
    $journeyControl = JourneyControl::getInstance();
    //Tenemos todos los journeys con el mismo origen almacenados
    $result = $journeyControl->getJourneysByOrigin($origin);

    //Miramos a ver si en el trip al que pertenece el  journey existe el destino de la busqueda
    //$journeys = array();
    while ($row = $result->fetch_array()){
    	$tripID = $row['tripID'];
    	$journeysWithTripIDandDest = $journeyControl->getJourneysByTripAndDest($tripID, $destination);
    	if (empty($journeysWithTripIDandDest)) {
     		// No hay viajes que coincida origen y destino dentro del trip seleccionado
		}else{
			//Hay viajes con origen y destino que coinciden con la busqueda
			$tripControl = TripControl::getInstance();
			
			$journeysWithTripID = $journeyControl->getJourneysByTrip($tripID);
			//Saco el conductor de ese viaje
			$driverUsernameQuery = $tripControl->getDriverUsername($tripID);
			while($rowDriverUsername = $driverUsernameQuery->fetch_array()){
				$driverUsername = $rowDriverUsername['driverUsername'];
			}
			$trip = new Trip($origin, $destination, $driverUsername);
			$minNumberSeats = 1000000;
			//Recorro todos los journeys 
			while($rowJourneys = $journeysWithTripID->fetch_array()){
				$trip->addPrice($rowJourneys['price']);
				if($minNumberSeats > $rowJourneys['nSeats']){
					$minNumberSeats = $rowJourneys['nSeats'];
				}
				$trip->addJourney(new Journey($tripID, $rowJourneys['journeyID'], $rowJourneys['departureDate'], $rowJourneys['arrivalDate'], $rowJourneys['origin'], $rowJourneys['destination'], $rowJourneys['nSeats'], $rowJourneys['price']));
			}
			$trip->setSeats($minNumberSeats);
			$userControl = UserControl::getInstance();
			$driverData = $userControl->getUserByUserName($driverUsername);
			$driver = null;
			while($rowDriverData = $driverData->fetch_array()){
				$driver = new Driver($rowDriverData['name'], $rowDriverData['email'], $rowDriverData['username'], $rowDriverData['phone'], $rowDriverData['dni'], $rowDriverData['photo']);
			}
			$templateJourney = TemplateJourney::getInstance();
			$templateshtml = "";
			$templateshtml .= $templateJourney->getTemplate($driver, $trip);
		}
    }

    echo $templateshtml;

?>