<?php
    include '../models/AdminControl.php';




    //acceso a la BBDD
    $adminControl = AdminControl::getInstance();
    $result = $adminControl -> getPassenger();
    $passenger = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($passenger, $row);
    }

    echo json_encode($passenger);

?>