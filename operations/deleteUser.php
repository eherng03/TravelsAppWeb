<?php
    include '../models/adminMainWindowControl.php';
    include '../objects/Driver.php';

    $user = $_REQUEST['user'];
    //acceso a la BBDD
    $adminMainWindowControl = AdminMainWimdowControl::getInstance();
    $result = $adminMainWindowControl -> getDriver($user1,$user2);

?>


