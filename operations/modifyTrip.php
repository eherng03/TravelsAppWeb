<?php
    namespace travels\operations;
    use travels\models as models;
    include "../models/JourneyControl.php";

    $tripID = current($_POST);
	$nJourneys = next($_POST);
	
	print_r($tripID);
	print_r($nJourneys);

    //acceso a la BBDD
    $journeyControl = models\JourneyControl::getInstance();
    
	for($i = 1; $i <= $nJourneys; $i++){
		$price = next($_POST);
		print_r($price." ");
		$seats = next($_POST);
		print_r($seats ." ");
		$journeyControl->updateJourney($tripID,$i,$price,$seats);
	}

	header("Location: ../graphic/driverMainWindow.php?modify=yes");
	exit();
?>


