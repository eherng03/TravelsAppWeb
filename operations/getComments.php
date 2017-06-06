<?php
    include '../models/CommentControl.php';

    $driverUsername = $_REQUEST['driverUsername'];

    //acceso a la BBDD
    $commentControl = CommentControl::getInstance();
    $result = $commentControl -> getCommentsByUsername($driverUsername);


    $comments = array();

    //guardados todos los datos como object destino
    while($row = $result->fetch_array()){
        array_push($comments, $row);
    }
    
   // echo '<pre>'; print_r($comments); echo '</pre>';
    // return de datos via AJAX
    echo json_encode($comments);
?>