<?php
    include '../models/DriverControl.php';


    $tripID = $_REQUEST['tripID'];

    //acceso a la BBDD
    $driverControl = DriverControl::getInstance();
    $result = $driverControl -> getDriverByID($tripID);

    $driver = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         $driver = $row;
    }

    echo json_encode($driver);

?>