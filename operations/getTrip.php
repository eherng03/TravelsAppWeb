<?php
    include '../models/ChatControl.php';


    $journey = $_REQUEST['journey'];

    //acceso a la BBDD
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> getTrip($journey);

    $trip = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         $trip = $row;
    }

    echo json_encode($trip);

?>