<?php
    include "../models/TripControl.php";

    $tripID = $_GET['tripID'];
	
    //acceso a la BBDD
    $tripControl = TripControl::getInstance();
    $result = $tripControl -> deleteTripByID($tripID);

	if($result)
		print_r("Viaje borrado correctamente.");
	else print_r("Error al borrar viaje.");
?>


