<?php
    include '../models/UserControl.php';

	$tripID = $_REQUEST['tripID'];
	$journeyID = $_REQUEST['journeyID'];

    //acceso a la BBDD
    $userControl = UserControl::getInstance();
    $result = $userControl -> getUsersTripJourney($tripID,$journeyID);

    $passengers = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($passengers, $row);
    }
    

    // return de datos via AJAX
    echo json_encode($passengers);
?>