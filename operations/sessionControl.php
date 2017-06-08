<?php
	require "../dataBase/DBManager.php";
	session_start();		//Con esto deja escribir en el array $_SESSION
	
	//usertype 0 = PASSENGER
	//usertype 1 = DRIVER
	//usertype 2 = ADMIN

	$singleton = DBManager::getInstance();
	$conn = $singleton->getConnection();
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	if($user == "admin" && $pass == "admin"){
		$_SESSION['username'] = $user;
		$_SESSION['isLogged'] = true;
		$_SESSION['userType'] = 2;
		header("Location: ../graphic/adminMainWindow.php");
	}else{
			
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
				
				if($userData['rol'] === 0){
					header("Location: ../graphic/passengerMainWindow.php"); 
					exit();
				}
				else{
					header("Location: ../graphic/driverMainWindow.php");
					exit();
				}
			
			} else {
				$query->close();
				header("Location: ../graphic/initWindow.php?login=error"); 
				exit();
			}
		}else {
			$query->close();
			header("Location: ../graphic/initWindow.php?login=error"); 
			exit();
		}
	}
?>
