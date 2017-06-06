<?php
    include '../models/JourneyControl.php';


    $userLog = $_REQUEST['userLog'];

    //acceso a la BBDD
    $journeyControl = JourneyControl::getInstance();
    $result = $journeyControl -> getJourneysByUserName($userLog);

    $journeys = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         $journeys = $row;
    }
    
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($journeys);
?>