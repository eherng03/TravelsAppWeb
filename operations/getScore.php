<?php
    namespace travels\operations;
    use travels\models as models;
    use travels\templates as templates;
    use travels\objects as objects;

    include '../models/CommentControl.php';
    include '../objects/Comment.php';
    include '../templates/TemplateScore.php';

    $userLog = $_REQUEST['userLog'];
 
    //acceso a la BBDD
    $commentControl = models\CommentControl::getInstance();
    $result = $commentControl -> getComments($userLog);

    $templateshtml = "";

    //guardados todos los datos como object destino
    while($rowComment = $result->fetch_array()){
        $comment = new objects\Comment($rowComment['commentID'],$rowComment['driverUsername'],$rowComment['passUsername'],$rowComment['comment'],$rowComment['score']);
        if (empty($comment)) {
            // No hay viajes que coincida origen y destino dentro del trip seleccionado
        }else{
            $templateScore = templates\TemplateScore::getInstance();
            $templateshtml .= $templateScore->getTemplate($comment);
        }
    }
    echo $templateshtml;
?>