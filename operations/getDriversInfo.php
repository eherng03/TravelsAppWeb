<?php
    include '../models/UserControl.php';




    //acceso a la BBDD
    $userControl = UserControl::getInstance();
    $result = $userControl -> getUsersDriver();
    $driver = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($driver, $row);
    }

    echo json_encode($driver);

?>