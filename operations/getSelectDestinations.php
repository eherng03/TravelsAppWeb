<?php
    include "../models/JourneyControl.php";
    include "../objects/Journey.php";
    
    //acceso a la BBDD

    $origin = $_POST['origin'];
    $tripID = $_POST['trip'];

    $journeyControl = JourneyControl::getInstance();
    //Busco el id del journey con el mismo origen
    $result = $journeyControl->getJourneysIDbyOriginAndTrip($origin, $tripID);         
    $journeyID = "";
     while ($row = $result->fetch_array()){
        $journeyID = $row['journeyID'];
     }

    $resultJourneys = $journeyControl->getJourneysDatabyJourneyAndTrip($journeyID, $tripID); 
     //Devuelvo todos lo destinos del mismo trip e id mayor que el origen
    $journeys = array();
    while ($row = $resultJourneys->fetch_array()){
        array_push($journeys, new Journey($row['tripID'], $row['journeyID'], $row['departureDate'], $row['arrivalDate'], $row['origin'], $row['destination'], $row['nSeats'], $row['price']));
    }
    
    echo json_encode($journeys);
?>