<?php
    include '../models/JourneyControl.php';


    $journeyID = $_REQUEST['journeyID'];
    $tripID = $_REQUEST['tripID'];

    //acceso a la BBDD
    $journeyControl = JourneyControl::getInstance();
    $result = $journeyControl->getDestinationByJourneyIDandTripID($journeyID,$tripID);

    $trip = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($trip, $row);
    }
    //echo '<pre>'; print_r($trip); echo '</pre>';
    echo json_encode($trip);

?>