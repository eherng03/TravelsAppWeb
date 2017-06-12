<?php
	namespace travels\operations;
	use travels\models as models;
    include "../models/TripControl.php";

    $tripID = $_GET['tripID'];
	
    //acceso a la BBDD
    $tripControl = models\TripControl::getInstance();
    $result = $tripControl -> deleteTripByID($tripID);

	if($result){
		print_r("Viaje borrado correctamente.");
	}else{
		print_r("Error al borrar viaje.");
	}
?>


