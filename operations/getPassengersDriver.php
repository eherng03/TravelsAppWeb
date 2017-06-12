<?php
    namespace travels\operations;
    use travels\models as models;
    include '../models/JourneyPassengersControl.php';


    $journey = $_REQUEST['journey'];

    //acceso a la BBDD
    $journeyPassengersControl = models\JourneyPassengersControl::getInstance();
    $result = $journeyPassengersControl -> getUsersByJourneys($journey);

    $passengers = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($passengers, $row);
    }
    
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($passengers);
?>