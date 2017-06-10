<?php
    include_once '../dataBase/DBManager.php';
    include_once "../objects/Journey.php";
    include_once "../models/TripControl.php";
    include_once "../models/JourneyControl.php";
	
    //acceso a la BBDD
    $singleton = DBManager::getInstance();
    $conn = $singleton -> getConnection();
	
	$origin = $_POST['origin'];
	$dateOrigin = strtotime($_POST['dateOrigin']);
	$nDests = $_POST['nDests'];
	$driver = $_POST['driver'];

	$journeyOrigin = $origin;			//el primer origen del journey es el del viaje
	$departureDate = $dateOrigin;		//la primera fecha de salida de los journeys es la de inicio
	$journeys = array();

	$journeyDest = "";
	for ($i = 1; $i <= $nDests; $i++) {
    	$destString = "dest".$i; 
    	$journeyDest = $_POST[$destString];		//Destino i
    	$nSeatsString = "nSeats".$i; 
    	$nSeats = $_POST[$nSeatsString];		//numero de asientos del journey i
    	$arrivalDateString = "date".$i; 
    	$arrivalDate = strtotime($_POST[$arrivalDateString]);		//numero de asientos del journey i
    	$priceString = "price".$i;
    	$price = $_POST[$priceString];

    	array_push($journeys, new Journey('0', $i, $departureDate, $arrivalDate, $journeyOrigin, $journeyDest, $nSeats, $price));
    	$departureDate = $arrivalDate;
    	$journeyOrigin = $journeyDest;
	}
	//En la ultima vuelta del bucle se queda guardado en $journeyDest, el ultimo destino
	
	$tripControl = TripControl::getInstance();	
	$resultTrip = $tripControl->insertTrip($driver, $origin, $journeyDest);		//Trip insertado
	$tripID = "";
	while ($row = $resultTrip->fetch_array()){
        $tripID = $row['tripID'];
    }

	foreach ($journeys as $jour) {
		$journeyControl = JourneyControl::getInstance();
		$resultJourney = $journeyControl->insertJourney($tripID, $jour->getID() , $jour->getDepartureDate(), $jour->getArrivalDate(), $jour->getPrice(), $jour->getSeats(), $jour->getOrigin(), $jour->getDestination());	
	}

	if($resultJourney == 0){
		header("Location: ../graphic/driverMainWindow.php?create=yes");
		exit();
	}else{
		header("Location: ../graphic/driverMainWindow.php?create=no");
		exit();
	}
	//print_r("Viaje insertado correctamente.");

?>
