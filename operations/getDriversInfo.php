<?php
    include '../models/AdminControl.php';




    //acceso a la BBDD
    $adminControl = AdminControl::getInstance();
    $result = $adminControl -> getDriver();
    $driver = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($driver, $row);
    }

    echo json_encode($driver);

?>