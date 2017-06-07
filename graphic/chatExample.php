<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Chat </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="../resources/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../resources/theme/css/chat.css">
    <script src="../logic/chatLogic.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <main></main>
  </body>
</html>
<!--navbar-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display-->
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="#">You Shop Name</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling-->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Category one <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Category two</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown" id="n_chats">
          <ul class="dropdown-menu dropdown-cart" role="menu" id="chats"></ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--chat estructura-->
<aside class="tabbed_sidebar ng-scope chat_sidebar popup-box-on" id="sidebar_secondary">
  <div class="popup-head">
    <div class="popup-head-left pull-left"><a design="" and="" developmenta="" target="_blank" id="Foto"></a></div>
    <div class="popup-head-right pull-right">
      <div class="btn-group gurdeepoushan">
        <button class="chat-header-button" id="actualizarChat" type="button" alt="Actualizar" title="Actualizar"><i class="glyphicon glyphicon-refresh"></i></button>
        <button class="chat-header-button pull-right" id="removeClass" data-widget="remove" type="button" alt="Cerrar" title="Cerrar chat"><i class="glyphicon glyphicon-remove"></i></button>
      </div>
    </div>
  </div>
  <div class="chat_box_wrapper chat_box_small chat_box_active" id="chat" style="opacity: 1; display: block; transform: translateX(0px);">
    <div class="chat_box touchscroll chat_box_colors_a" id="mensajes"></div>
  </div>
  <div class="chat_submit_box">
    <div class="uk-input-group">
      <div class="gurdeep-chat-box">
        <input class="md-input" id="submit_message" type="text" placeholder="Escriba un mensaje..." name="submit_message">
      </div><a class="btn btn-success btn-sm" id="enviarMensaje"><span class="glyphicon gglyphicon-comment"></span> Enviar</a>
    </div>
  </div>
</aside>