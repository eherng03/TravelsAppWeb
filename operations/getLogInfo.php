<?php
    namespace travels\operations;
    use travels\models as models;
    include '../models/UserControl.php';


    $userLog = $_REQUEST['userLog'];

    //acceso a la BBDD
    $userControl = models\UserControl::getInstance();
    $result = $userControl->getUserByUserName($userLog);

    $logInfo = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
         $logInfo = $row;
    }

    echo json_encode($logInfo);

?>