<?php
    include '../models/ChatControl.php';


    $username = $_REQUEST['username'];


    //acceso a la BBDD
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> getPassengersInfo($username);

    $userInfo = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($userInfo, $row);
    }
    
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($userInfo);
?>