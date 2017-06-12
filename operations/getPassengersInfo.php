<?php
    namespace travels\operations;
    use travels\models as models;
    include '../models/UserControl.php';


    $userControl = models\UserControl::getInstance();
   
    $username = $_REQUEST['username'];


    //acceso a la BBDD
    $userControl = models\UserControl::getInstance();
    $result = $userControl->getUserByUserName($username);

    $userInfo = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($userInfo, $row);
    }
    
    //echo '<pre>'; print_r($chats); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($userInfo);
?>