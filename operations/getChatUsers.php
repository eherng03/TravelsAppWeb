<?php
    include '../models/ChatControl.php';
    include '../objects/User.php';

   $user2 = $_REQUEST['user2'];

     //acceso a la BBDD
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> getUser($user2);

    $chats = array();


    //guardados todos los datos como object destino
    //guardados todos los datos como object destino
    while($row = $result -> fetch_array()){
        array_push($chats, new User($row['name'],$row['email'],$row['username'],$row['phone'],$row['dni'],$row['photo']));
    }
    
    // return de datos via AJAX
    echo json_encode($chats);
?>