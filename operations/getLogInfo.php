<?php
    include '../models/ChatControl.php';


    $userLog = $_REQUEST['userLog'];

    //acceso a la BBDD
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> getLogInfo($userLog);

    $logInfo = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         $logInfo = $row;
    }

    echo json_encode($logInfo);

?>