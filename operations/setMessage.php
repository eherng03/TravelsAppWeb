<?php
    include '../models/ChatControl.php';

    include '../objects/Chat.php';
//Conexcion de la bbdd

    $user1 = $_POST['user1'];
    $user2 = $_POST['user2'];
    $hour = $_POST['hour'];
    $msg = $_POST['msg'];

    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> setChatMessages($user1,$user2,$hour,$msg);

//guardamos todas las plazas obtneidas
    $msgs = array();

    while($row = $result -> fetch_array()){
        array_push($msgs, new Chat($row['user1'],$row['user2'],$row['hour'],$row['msg']));
    }

    echo json_encode($msgs);
?>