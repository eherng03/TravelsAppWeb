<?php
    include '../models/ChatControl.php';

    $user1 = $_POST['user1'];
    $user2 = $_POST['user2'];
    $mlsecond = $_POST['mlsecond'];
    $msg = $_POST['msg'];

    //Conexcion de la bbdd
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> setMessage($user1,$user2,$mlsecond,$msg);


?>