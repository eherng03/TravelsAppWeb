<?php
    include '../models/adminMainWindowControl.php';
    include '../objects/Driver.php';


//acceso a la BBDD
    $adminMainWindowControl = AdminMainWimdowControl::getInstance();
    $result = $adminMainWindowControl -> getDriver();

    $chats = array();


    //guardados todos los datos como object destino
    while($row = $result -> fetch_array()){
        array_push($chats, new Driver($row['name'],$row['email'],$row['username'],$row['phone'],$row['dni'],$row['photo']));
    }
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($chats);
?>


