<?php
    namespace travels\operations;
    use travels\models as models;
    include '../models/JourneyPassengersControl.php';

    $userLog = $_REQUEST['userLog'];

    $journeyPassengersControl = models\JourneyPassengersControl::getInstance();
    $result = $journeyPassengersControl -> getJourneysAndTripIDByUser($userLog);

    $journeys = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
          array_push($journeys, $row);
    }
    
    //echo '<pre>'; print_r($journeys); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($journeys);
?>