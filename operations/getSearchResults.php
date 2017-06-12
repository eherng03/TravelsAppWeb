<?php
	namespace travels\operations;
    use travels\models as models;
    use travels\objects as objects;
    use travels\templates as templates;
	include "../models/JourneyControl.php";
	include "../models/TripControl.php";
	include "../models/UserControl.php";
	include "../models/JourneyPassengersControl.php";
	include "../models/CommentControl.php";
    include "../objects/Journey.php";
    include "../objects/Trip.php";
    include "../objects/Driver.php";
    include "../templates/TemplateJourney.php";
    
    $origin = $_POST['origin'];
   	$destination = $_POST['destination'];
   	$userNameLogged = $_POST['userNameLogged'];
   	$dateStart = $_POST['dateStart']/1000;
   	$dateEnd = $_POST['dateEnd']/1000;
   	$price = $_POST['price'];
   	$score = $_POST['score'];

   	$templateshtml = "";

   	if($origin !=  "- - -" && $destination !=  "- - -"){

		//acceso a la BBDD
	    $journeyControl = models\JourneyControl::getInstance();
	    //Tenemos todos los journeys con el mismo origen almacenados
	    if($dateStart == ""){
	    	$result = $journeyControl->getJourneysByOrigin($origin);
	    }else{
	    	$result = $journeyControl->getJourneysByOriginAndDate($origin, $dateStart, $dateEnd);
	    }

	    //Miramos a ver si en el trip al que pertenece el  journey existe el destino de la busqueda
	    while ($row = $result->fetch_array()){
	    	$tripID = $row['tripID'];
	    	$journeysWithTripIDandDest = $journeyControl->getJourneysByTripAndDest($tripID, $destination);
	    	$tripControl = models\TripControl::getInstance();
	    	$tripInfo = $tripControl->getTripInfoByID($tripID);
	    	while($rowTripInfo = $tripInfo->fetch_array()){
	    		$cancelled = $rowTripInfo['cancelled'];
	    	}
	    	if($cancelled == 0){
	    		if (empty($journeysWithTripIDandDest)) {
	     		// No hay viajes que coincida origen y destino dentro del trip seleccionado
				}else{
					//Hay viajes con origen y destino que coinciden con la busqueda
					$journeysWithTripID = $journeyControl->getJourneysByTrip($tripID);
					//Saco el conductor de ese viaje
					$driverUsernameQuery = $tripControl->getDriverUsername($tripID);
					while($rowDriverUsername = $driverUsernameQuery->fetch_array()){
						$driverUsername = $rowDriverUsername['driverUsername'];
					}
					$trip = new objects\Trip($origin, $destination, $driverUsername);
					$minNumberSeats = 1000000000000;
					//Recorro todos los journeys y meto en el trip por los que pasa el cliente
					
					$idJourneyOrigin = -1;
					$idJourneyDestination = -1;

					while($rowJourneys = $journeysWithTripID->fetch_array()){
						if($rowJourneys['origin'] == $trip->getOrigin()){
							$idJourneyOrigin = $rowJourneys['journeyID'];
							$trip->setInitDate($rowJourneys['departureDate']);
						}

						if($idJourneyOrigin != -1 && $idJourneyOrigin <= $rowJourneys['journeyID']){

							$trip->addPrice($rowJourneys['price']);

							$journeyPassengersControl = models\JourneyPassengersControl::getInstance();
							$numberPassengersJourney = $journeyPassengersControl->getNumPassengersByTripAndJourneyID($tripID, $rowJourneys['journeyID']);
							
							if($minNumberSeats > $rowJourneys['nSeats'] - $numberPassengersJourney){
								$minNumberSeats = $rowJourneys['nSeats'] - $numberPassengersJourney;
							}
						
							$trip->addJourney(new objects\Journey($tripID, $rowJourneys['journeyID'], $rowJourneys['departureDate'], $rowJourneys['arrivalDate'], $rowJourneys['origin'], $rowJourneys['destination'], $rowJourneys['nSeats'], $rowJourneys['price']));
						}

						if($rowJourneys['destination'] == $trip->getDestination()){
							$trip->setArrivalDate($rowJourneys['arrivalDate']);
							break;
						}
					}

					if($minNumberSeats > 0){
						$trip->setSeats($minNumberSeats);
						$userControl = models\UserControl::getInstance();
						$driverData = $userControl->getUserByUserName($driverUsername);
						$driver = null;

						while($rowDriverData = $driverData->fetch_array()){
							$driver = new objects\Driver($rowDriverData['name'], $rowDriverData['email'], $rowDriverData['username'], $rowDriverData['phone'], $rowDriverData['dni'], $rowDriverData['photo']);
						}

						$templateJourney = templates\TemplateJourney::getInstance();
						$templateshtml .= $templateJourney->getTemplate($driver, $trip, $userNameLogged, $cancelled);
						if($score != ""){
							$commentControl = models\CommentControl::getInstance();
							$commentsData = $commentControl->getComments($driverUsername);
							
							$scores = array();
							while($rowComments = $commentsData->fetch_array()){
								array_push($scores, $rowComments['score']);
							}

							$totalScores = 0;
							foreach ($scores as $scoreVal) {
								$totalScores += $scoreVal;
							}

							$average = $totalScores/count($scores);
							if($score > $average){
								$templateshtml = "";
							}
						}
						if($price != "" && $trip->getPrice() > $price){
							$templateshtml = "";
						}
						echo $templateshtml;
					}
				}
		    } 
		}

   	}

    
?>