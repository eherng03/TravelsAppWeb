<?php
	require "BBDDManager.php"; //THIS IS GUT?
	session_start();
	
	//Primero coger el conn del BBDDManager
	$singleton = BBDDManager::getInstance();
	$conn = $singleton->getConnection();
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if(isset($_POST['selecDriver']) && $_POST['selecDriver'] === "on"){
		$userType = 1; 
		$query = $conn->prepare("SELECT * FROM Drivers WHERE user = ?");
	} else{
		$userType = 0;
		$query = $conn->prepare("SELECT * FROM Passengers WHERE user = ?");
	}

	$query->bind_param("s", $user);
	
	$query->execute();
	$result = $query->get_result();
	
	if($result->num_rows > 0){
		$userData = $result->fetch_array();
		
		if($pass === $userData['password']){
			$_SESSION['username'] = $user;
			$_SESSION['isLogged'] = true;
			$_SESSION['userType'] = $userType;
			
			print_r("Login correcto");
			//$_SESSION['start'] = time();
			//$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
		
		} else {
			print_r("Contraseña incorrecta.");
		}
	}else { //ESTO HAY QUE CAMBIARLO
		header("Location: /TravelsAppWeb-iker/initWindow.html"); 
		print_r("Usuario y/o contraseña incorrectos.");
	}
	$query->close();
	
?>
