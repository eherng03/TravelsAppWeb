<?php
    include '../models/CommentControl.php';
    include '../objects/Comment.php';
    include '../templates/TemplateScore.php';

    $userLog = $_REQUEST['userLog'];
 
    //acceso a la BBDD
    $commentControl = CommentControl::getInstance();
    $result = $commentControl -> getComments($userLog);

    $templateshtml = "";

    //guardados todos los datos como object destino
    while($rowComment = $result->fetch_array()){
        $comment = new Comment($rowComment['commentID'],$rowComment['driverUsername'],$rowComment['passUsername'],$rowComment['comment'],$rowComment['score']);
        if (empty($comment)) {
            // No hay viajes que coincida origen y destino dentro del trip seleccionado
        }else{
            $templateScore = TemplateScore::getInstance();
            $templateshtml .= $templateScore->getTemplate($comment);
        }
    }
   // echo '<pre>'; print_r($comments); echo '</pre>';
    // return de datos via AJAX
    echo $templateshtml;
?>