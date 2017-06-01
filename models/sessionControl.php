<?php
	require "../dataBase/DBManager.php";
	session_start();

	$singleton = DBManager::getInstance();
	$conn = $singleton->getConnection();
	
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$query = $conn->prepare("SELECT * FROM Users WHERE username = ?");
	$query->bind_param("s", $user);
	
	$query->execute();
	$result = $query->get_result();
	
	if($result->num_rows > 0){
		$userData = $result->fetch_array();
		
		if($pass === $userData['pass']){
			$query->close();
			
			$_SESSION['username'] = $user;
			$_SESSION['isLogged'] = true;
			$_SESSION['userType'] = $userData['rol'];
			
			if($userData['rol'] === 0)
				header("Location: ../graphic/passengerMainWindow.html"); 
			else header("Location: ../graphic/driverMainWindow.html"); 
			
			//$_SESSION['start'] = time();
			//$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
		
		} else {
			print_r("Contraseña incorrecta.");
		}
	}else {
		$query->close();
		print_r("Usuario y/o contraseña incorrectos. Redirigiendo a la pagina principal.");
		sleep(2);
		header("Location: ../graphic/initWindow.html"); 
		
	}
?>
