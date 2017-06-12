<?php
    namespace travels\operations;
    use travels\models as models;   
    include '../models/UserControl.php';

    //acceso a la BBDD
    $userControl = models\UserControl::getInstance();
    $result = $userControl -> getUsersPassenger();
    $passenger = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($passenger, $row);
    }

    echo json_encode($passenger);

?>