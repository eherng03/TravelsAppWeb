<?php
    namespace travels\operations;
    use travels\models as models;

    include '../models/UserControl.php';

	$tripID = $_REQUEST['tripID'];

    //acceso a la BBDD
    $userControl = models\UserControl::getInstance();
    $result = $userControl -> getUsersTrip($tripID);

    $passengers = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($passengers, $row);
    }
    

    // return de datos via AJAX
    echo json_encode($passengers);
?>