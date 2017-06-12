<?php
	namespace travels\operations;
	use travels\models as models;
    include '../models/UserControl.php';

    $username = $_REQUEST['username'];
    //acceso a la BBDD
    $userControl = models\UserControl::getInstance();
    $result = $userControl -> deleteUserDyUsername($username);
    $driver = array();
?>


