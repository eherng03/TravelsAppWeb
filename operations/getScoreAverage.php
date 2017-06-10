<?php
    include '../models/DriverControl.php';

    $userLog = $_REQUEST['userLog'];

    //acceso a la BBDD
    $driverControl = DriverControl::getInstance();
    $result = $driverControl -> getScoreAverage($userLog);

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        ($scoreAverage = $row);
    }
    
   // echo '<pre>'; print_r($comments); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($scoreAverage);
?>