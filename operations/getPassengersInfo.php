<?php
    include '../models/UserControl.php';


    $username = $_REQUEST['username'];


    //acceso a la BBDD
    $userControl = UserControl::getInstance();
    $result = $userControl -> getPassengersInfo($username);

    $userInfo = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($userInfo, $row);
    }
    
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($userInfo);
?>