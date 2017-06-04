<?php
    include '../models/ChatControl.php';
    include '../objects/Chat.php';


    $user1 = $_REQUEST['user1'];
    $user2 = $_REQUEST['user2'];

//acceso a la BBDD
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> getChatMessages($user1,$user2);

    $chats = array();


    //guardados todos los datos como object destino
    while($row = $result -> fetch_array()){
        array_push($chats, new Chat($row['user1'],$row['user2'],$row['hour'],$row['msg']));
    }
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($chats);
?>


