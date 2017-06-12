<?php
    namespace travels\operations;
    use travels\models as models;
    include '../models/UserControl.php';

    $userControl = models\UserControl::getInstance();
    $result = $userControl -> getUsersDriver();
    $driver = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($driver, $row);
    }

    echo json_encode($driver);

?>