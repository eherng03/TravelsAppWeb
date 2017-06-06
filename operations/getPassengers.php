<?php
    include '../models/ChatControl.php';


    $journey = $_REQUEST['journey'];
    $userLog = $_REQUEST['userLog'];

    //acceso a la BBDD
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> getPassengers($journey,$userLog);

    $passengers = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($passengers, $row);
    }
    
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($passengers);
?>