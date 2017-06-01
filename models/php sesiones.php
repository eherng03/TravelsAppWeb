	
	<?php
		//Conductor no puede estar aqui
		session_start();
		if($_SESSION['userType'] == 1)
			header('Location: ../graphic/driverMainWindow.html');
	?>
	
	//Pasajero no puede estar aquí
	<?php
		session_start();
		if($_SESSION['userType'] == 0)
			header('Location: ../graphic/passengerMainWindow.html');
	?>