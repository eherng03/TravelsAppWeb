<?php
    include '../models/adminControl.php';

    $username = $_REQUEST['username'];
    //acceso a la BBDD
    $adminControl = AdminControl::getInstance();
    $result = $adminControl -> deleteUser($username);
    $driver = array();
?>


