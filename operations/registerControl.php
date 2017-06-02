<?php
	require "../dataBase/DBManager.php";

	$singleton = DBManager::getInstance();
	$conn = $singleton->getConnection();

	$userType = 0;
	if($_POST['optradio'] === "driver")
		$userType = 1;
	
	$name = $_POST['nameRegister'];
	$user = $_POST['usernameRegister'];
	$pass = $_POST['passwordRegister'];
	$dni = $_POST['dniRegister'];
	$email = $_POST['emailRegister'];
	$phone = $_POST['phoneRegister'];
	
	//Image
	$target_dir = "../resources/userImages/";
	$target_file = $target_dir.basename($_FILES['userImage']['name']);
	$imageType = pathinfo($target_file, PATHINFO_EXTENSION);
	move_uploaded_file($_FILES['userImage']['tmp_name'], $target_dir.$user.".".$imageType);

	$file = $user.'.'.$imageType;
	
	$query = $conn->prepare("INSERT INTO Users(username, pass, name, dni, email, phone, photo, rol) VALUES (?,?,?,?,?,?,?,?)");
	$query->bind_param("sssssssi", $user,$pass,$name,$dni,$email,$phone,$file,$userType);
	
	if($query->execute()){ 
		$query->close();
		print_r("Registro completo. Redirigiendo a la pagina principal.");
		sleep(2);
		header("Location: ../graphic/initWindow.html");
	} else {
		$query->close();
		print_r("Error en el registro. Redirigiendo a la pagina principal.");
		sleep(2);
		header("Location: ../graphic/initWindow.html");
	}
?>
