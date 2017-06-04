<?php
    include "../objects/Chat.php";
    include '../models/ChatControl.php';


    $userLog = $_REQUEST['userLog'];

    //acceso a la BBDD
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> getNChats($userLog);



    $chats = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($chats, new Chat($row['user1'],$row['user2'],$row['hour'],$row['msg']));
    }
    
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($chats);
?>