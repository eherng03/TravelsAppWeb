<?php
    include '../models/JourneyControl.php';


    $journeyID = $_REQUEST['journeyID'];

    //acceso a la BBDD
    $journeyControl = JourneyControl::getInstance();
    $result = $journeyControl->getTripByJourneyID($journeyID);

    $trip = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($trip, $row);
    }
    //echo '<pre>'; print_r($trip); echo '</pre>';
    echo json_encode($trip);

?>