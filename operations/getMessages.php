<?php
    include '../models/ChatControl.php';
    include '../objects/Chat.php';


    $user1 = $_REQUEST['user1'];
    $user2 = $_REQUEST['user2'];


//acceso a la BBDD
    $chatControl = ChatControl::getInstance();
    $result = $chatControl -> getMessages($user1,$user2);

    $menssages = array();


   
    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         array_push($menssages, new Chat($row['user1'],$row['user2'],$row['hour'],$row['msg']));
    }
 //echo '<pre>'; print_r($menssages); echo '</pre>';
    echo json_encode($menssages);
?>


