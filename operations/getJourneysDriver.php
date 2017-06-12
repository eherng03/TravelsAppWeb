<?php
    namespace travels\operations;
    use travels\models as models;
    include '../models/JourneyControl.php';


    $tripID = $_REQUEST['tripID'];

    //acceso a la BBDD
    $journeyControl = models\JourneyControl::getInstance();
    $result = $journeyControl->getJourneysByTrip($tripID);

    $journeys = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($journeys, $row);
    }
    //echo '<pre>'; print_r($trip); echo '</pre>';
    echo json_encode($journeys);

?>