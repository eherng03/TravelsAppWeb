<?php
    namespace travels\operations;
    use travels\models as models;
    include '../models/JourneyPassengersControl.php';

	$tripID = $_REQUEST['tripID'];
    $journey = $_REQUEST['journey'];
    $userLog = $_REQUEST['userLog'];

    //acceso a la BBDD
    $journeyPassengersControl = models\JourneyPassengersControl::getInstance();
    $result = $journeyPassengersControl -> getPassengers($tripID,$journey,$userLog);

    $passengers = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($passengers, $row);
    }
    
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($passengers);
?>