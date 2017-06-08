<?php
    include '../models/TripControl.php';


    $driverID = $_REQUEST['driverID'];

    //acceso a la BBDD
    $tripControl = TripControl::getInstance();
    $result = $tripControl->getTripByDriver($driverID);

    $trips = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($trips, $row);
    }
    //echo '<pre>'; print_r($trip); echo '</pre>';
    echo json_encode($trips);

?>