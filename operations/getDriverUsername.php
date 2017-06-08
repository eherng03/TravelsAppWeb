<?php
    include '../models/TripControl.php';


    $tripID = $_REQUEST['tripID'];

    //acceso a la BBDD
    $tripControl = TripControl::getInstance();
    $result = $tripControl -> getDriverUsername($tripID);

    $driver = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         $driver = $row;
    }
    //echo '<pre>'; print_r($driver); echo '</pre>';
    echo json_encode($driver);

?>