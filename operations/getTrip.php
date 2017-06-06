<?php
    include '../models/JourneyControl.php';


    $journey = $_REQUEST['journey'];

    //acceso a la BBDD
    $journeyControl = JourneyControl::getInstance();
    $result = $journeyControl -> getTrip($journey);

    $trip = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         $trip = $row;
    }

    echo json_encode($trip);

?>