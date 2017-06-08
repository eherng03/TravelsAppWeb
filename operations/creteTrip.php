<?php
    include '../dataBase/DBManager.php';
	
    //acceso a la BBDD
    $singleton = DBManager::getInstance();
    $conn = $singleton -> getConnection();
	
	print_r($_POST);

?>