<?php
    //Conductor no puede estar aqui
    session_start();
    if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 0)
      header('Location: ../graphic/initWindow.php?session=no');
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Pasajero</title>
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="../resources/theme/css/passengerMainWindowStyle.css">
        <link rel="stylesheet" type="text/css" href="../resources/theme/css/chat.css">
        <!--JS-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script type='text/javascript' src='../logic/searchLogic.js'></script>
		<script type='text/javascript' src="../logic/chatLogicPassenger.js"></script>
		<script type='text/javascript' src='../logic/passengerMainWindowLogic.js'></script>
        
		
        <!--EXTERNAL-->
		<script src='../resources/bootstrap/js/bootstrap.js'></script>
        <script src='../resources/bootstrap/js/bootstrap-datepicker.js'></script>
        <script src='../resources/bootstrap/locales/bootstrap-datepicker.es.min.js'></script>

        <link rel="stylesheet"  href="../resources/bootstrap/css/bootstrap.css">
        <link rel="stylesheet"  href="../resources/bootstrap/css/bootstrap-datepicker.css">
        <link rel="stylesheet"  href="../resources/bootstrap/css/custom.css">

    </head>
    <body>
        <header class = "Header">
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                <div class="navbar-header">
                <!-- Boton para cuando se hace la pantalla estrecha-->
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><a class="navbar-brand" href="#" id = "iconButton">
                        <img src="../resources/car.png">
                    </a>
                </div>
                <!-- nav links-->
                <div id="navBar" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="journeys-button"><a href="#">
                            Ver mis trayectos 
                        </a></li>
                        <li><a href="#"  class = "search-button">
                            Buscar viaje
                        </a></li>
						<li><a href="initWindow.php">
						Cerrar sesion
						</a></li>
                    </ul>
                    <!-- Chat. Si no hay mensajes no sale nada-->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" id="n_chats">
                        <ul class="dropdown-menu dropdown-cart" role="menu" id="chats"></ul>
                        </li>
                    </ul>
                </div>
              </div>
            </nav>
        </header>
        <main>			
			 <!--TRAYECTOS-->
			<div class="journeys-container">
				<div class = "journeys" id="journeys">
						<h1 class = "search-title">Mis trayectos</h1>
						
				</div>
			</div>
            <input type="hidden" id="hdnSession" value= 
                <?php echo $_SESSION['username']; ?>
            />

            <!--BUSQUEDA-->
            <div class = "search-container">
                <h1 class = "search-title">Encuentra el viaje que necesitas</h1>
                <div class = "search-content">
                    <div class="well-searchbox">
						<form class="form-horizontal" role="form">

								<label>Origen</label>
								<select class="form-control" id="origin">
									<option value="">- - -</option>
								</select>
						 
								<label>Destino</label>
								<select class="form-control" id="destination">
									<option value="">- - -</option>
								</select>

							<div class="input-group date"  data-provide = "datepicker" id = "datepicker">
								<input type="text" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
							</div>
							<label>Precio</label>
							<select class="form-control" id="price">
								<option value="">- - -</option>
								<option value="10">10€</option>
								<option value="20">20€</option>
								<option value="30">30€</option>
								<option value="40">40€</option>
								<option value="50">50€</option>
								<option value="60">60€</option>
								<option value="70">70€</option>
								<option value="80">80€</option>
								<option value="90">90€</option>
								<option value="100">100€</option>
								<option value="150">150€</option>
								<option value="200">200€</option>
							</select>
							<label>Puntuación</label>
							<select class="form-control" id="score">
								<option value="">- - -</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<br>
							<input class="btn" type="submit" value="Buscar" id = "searchBtn"/>
						</form>
						<div id = "searchResult"></div>
					</div>
                </div>
            </div>
        </main>

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
  <div class="chat_box_wrapper chat_box_small chat_box_active" id="chat">
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

    </body>
	
	 <!-- Modal content-->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header" id="modalHeader">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body">

            <table class="table table-bordered table-hover" id="tab_infoDriver">
            <thead>
              <tr id="">
              <th class="text-center" id="photoDriver">Foto</th>
              <th class="text-center" id="nameDriver">Nombre</th>
              <th class="text-center" id="emailDriver">Email</th>
              <th class="text-center" id="phoneDriver">Telefono</th>
              <th class="text-center" id="averageScore">Puntuacion media</th>
              
            </tr>
            </thead>
            <tbody></tbody>
            </table>

			<table class="table table-bordered table-hover" id="tab_comentarios">
			<thead>
			<tr id="">
			  <th class="text-center">Comentario</th>
			  <th class="text-center">Puntuacion</th>
			</tr>
			</thead>
			<tbody></tbody>
			</table>

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>
	
	<!-- Modal content-->
	<div id="myModal2" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header" id="modalHeader2">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body">

            <table class="table table-bordered table-hover" id="tab_infoPassenger">
            <thead>
				<tr id="">
				  <th class="text-center" id="namePass">Foto</th>
				  <th class="text-center" id="namePass">Nombre</th>
				</tr>
            </thead>
            <tbody></tbody>
            </table>

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>


     <!-- Modal content-->
    <div id="modalScore" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" id="modalHeader3">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

             <div class="form-group">
              <label for="sel1">Puntua</label>
              <select name="selector" class="form-control" id="sel1">
                <option val="1">1</option>
                <option val="2">2</option>
                <option val="3">3</option>
                <option val="4">4</option>
                <option val="5">5</option>
              </select>
            </div>

        <div class="form-group">
            <label for="comment">Deja un comentario:</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
        </div>

          </div>
          <div class="modal-footer">
            <div class="btn-group">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" data-dismiss="modal" id="enviarComentario">Enviar</button>
            </div>
          </div>
        </div>

      </div>
    </div>