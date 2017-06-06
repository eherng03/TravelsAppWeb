<?php
    include '../models/ChatControl.php';


    $tripID = $_REQUEST['tripID'];

    //acceso a la BBDD
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> getDriver($tripID);

    $driver = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         $driver = $row;
    }

    echo json_encode($driver);

?>