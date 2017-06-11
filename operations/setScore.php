<?php
    include '../models/CommentControl.php';

    $driverUsername = $_REQUEST['driverUsername'];
    $passUsername = $_REQUEST['passUsername'];
    $comment = $_REQUEST['comment'];
    $score = $_REQUEST['score'];

    //acceso a la BBDD
    $commentControl = CommentControl::getInstance();
    $result = $commentControl -> setScore($driverUsername,$passUsername,$comment,$score);

?>