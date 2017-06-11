<?php
    include "../models/TripControl.php";

    $tripID = $_GET['tripID'];
	
    //acceso a la BBDD
    $tripControl = TripControl::getInstance();
    $result = $tripControl -> cancelTripByID($tripID);

	if($result)
		print_r("Viaje cancelado correctamente.");
	else print_r("Error al cancelar viaje.");
?>


