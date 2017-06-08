<?php
    include "../models/JourneyControl.php";
    include "../objects/Journey.php";
    
    //acceso a la BBDD
    $journeyControl = JourneyControl::getInstance();
    $result = $journeyControl->getJourneys();         

    $journeys = array();
    while ($row = $result->fetch_array()){
        array_push($journeys, new Journey($row['tripID'], $row['journeyID'], $row['departureDate'], $row['arrivalDate'], $row['origin'], $row['destination'], $row['nSeats'], $row['price']));
    }
    
    echo json_encode($journeys);
?>