<?php
    include '../models/UserControl.php';

    $username = $_REQUEST['username'];
    //acceso a la BBDD
    $userControl = UserControl::getInstance();
    $result = $userControl -> deleteUserDyUsername($username);
    $driver = array();
?>


