<?php
	include "../models/JourneyControl.php";
	include "../models/TripControl.php";
	include "../models/DriverControl.php";
    include "../objects/Journey.php";
    include "../objects/Trip.php";
    
    $origin = $_REQUEST['origin'];
   	$destination = $_REQUEST['destination'];

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
			$driverUsername = $journeyControl->getDriverUsername($tripID);
			$trip = new Trip($origin, $destination, $driverUsername);
			//Recorro todos los journeys 
			while($rowJourneys = $journeysTripID->fetch_array()){
				$trip.addJourney(new Journey($tripID, $rowJourneys['journeyID'], $rowJourneys['departureDate'], $rowJourneys['arrivalDate'], $rowJourneys['origin'], $rowJourneys['destination'], $rowJourneys['nSeats'], $rowJourneys['cost']));
				$trip.addCost($rowJourneys['cost']);
			}
			$driverControl = DriverControl::getInstance();
			$driver = $driverControl->getDriverByUsername($driverUsername);

		}
    }

?>