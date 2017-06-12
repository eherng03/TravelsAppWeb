<?php
    namespace travels\operations;
    use travels\models as models;
    use travels\objects as objects;
    include "../models/JourneyControl.php";
    include "../objects/Journey.php";
    
    //acceso a la BBDD
    $journeyControl = models\JourneyControl::getInstance();
    $result = $journeyControl->getJourneys();         

    $journeys = array();
    while ($row = $result->fetch_array()){
        array_push($journeys, new objects\Journey($row['tripID'], $row['journeyID'], $row['departureDate'], $row['arrivalDate'], $row['origin'], $row['destination'], $row['nSeats'], $row['price']));
    }
    
    echo json_encode($journeys);
?>