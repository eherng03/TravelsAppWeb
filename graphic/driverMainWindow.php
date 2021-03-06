<?php
    //Pasajero no puede estar aqui
    session_start();
    if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 1)
      header('Location: ../graphic/initWindow.php?session=no');
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Conductor</title>
        <link rel="stylesheet" type="text/css" href="../resources/theme/css/driverMainWindowStyle.css">
        <link rel="stylesheet" type="text/css" href="../resources/theme/css/chat.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script type='text/javascript' src='../logic/driverMainWindowLogic.js'></script>

        <script src="../logic/chatLogicDriver.js"></script>
		<link rel="stylesheet" type="text/css" href="../resources/theme/css/chat.css">
		
		<script src='../resources/bootstrap/js/bootstrap.js'></script>
        <script src='../resources/bootstrap/js/bootstrap-datepicker.js'></script>
        <script src='../resources/bootstrap/locales/bootstrap-datepicker.es.min.js'></script>
        <script src='../resources/bootstrap/bootstrap-clockpicker.min.js'></script>

        <link rel="stylesheet"  href="../resources/bootstrap/css/bootstrap.css">
        <link rel="stylesheet"  href="../resources/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"  href="../resources/bootstrap/css/bootstrap-datepicker.css">
        <link rel="stylesheet"  href="../resources/bootstrap/bootstrap-clockpicker.min.css">
        <link rel="stylesheet"  href="../resources/bootstrap/css/custom.css">
    </head>
    <body>
	<?php if(isset($_GET['create']) && $_GET['create'] === "no"){?>
                <script>alert("ERROR AL CREAR VIAJE.");</script>
        <?php }?>
        <?php if(isset($_GET['create']) && $_GET['create'] === "yes"){?>
                <script>alert("VIAJE CREADO CORRECTAMENTE.");</script>
        <?php }?>
		<?php if(isset($_GET['modify']) && $_GET['modify'] === "yes"){?>
                <script>alert("VIAJE MODIFICADO CORRECTAMENTE.");</script>
        <?php }?>
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
      				</button>
      				<a class="navbar-brand" href="#" id = "iconButton">
                        <img src="../resources/car.png">
                    </a>
    			</div>
			    <!-- nav links-->
			     <div id="navBar" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      	<ul class="nav navbar-nav">
			        	<li class="journeys-button"><a href="#">
			        		Ver trayectos 
			        	</a></li>
			        	<li><a href="#" class = "create-button">
			        		Crear trayecto
			        	</a></li>
			        	<li><a class = "score-button" href="#">
			        		Mis valoraciones
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
        <input type="hidden" id="hdnSession" value= 
                <?php echo $_SESSION['username']; ?>
        />
        <main>
				<!--CREAR NUEVO TRAYECTO-->

				<div class = "create-container">
                    <h1 class = "create-title">Datos del viaje</h1>
                    <div class = "create-content">
                        <div class="well-content">
                            <form class="form-horizontal" role="form" action="../operations/createTrip.php" method="post">

                                <label>Origen</label>
                                <input class="form-control" placeholder="Origen" name="origin" type="text" id="origin" required/>
                                <div class="input-group date"  data-provide = "datepicker" id = "datepicker">
                                        <input type="text" class="form-control" placeholder="Fecha" name="dateOrigin" id="dateOrigin" required>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                                <div class="input-group clockpicker" data-provide = "clockpicker" id = "clockpicker">
                                    <input type="text" class="form-control" placeholder="Hora" name="hourOrigin" id="hourOrigin" required>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                                <hr>

                                <div id="destinations">
                                    <label>Destino 1</label>
                                    <input class="form-control" placeholder="Destino" name="dest1" type="text" id="dest1" required/>
                                    <label>Numero de asientos</label>
                                    <input class="form-control" placeholder="Numero de asientos" name="nSeats1" type="text" id="nSeats1" required/>
                                    <label>Precio</label>
                                    <input class="form-control" placeholder="Precio" name="price1" type="text" id="price1" required/>

                                    <div class="input-group date"  data-provide = "datepicker" id = "datepicker">
                                        <input type="text" class="form-control" placeholder="Fecha" name="date1" id="date1" required>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                    <div class="input-group clockpicker" data-provide = "clockpicker" id = "clockpicker">
                                        <input type="text" class="form-control" placeholder="Hora" name="hour1" id="hour1" required>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                    <hr>
                                </div>
                                <input type="hidden" name="nDests" id = "nDests">
                                <input type="hidden" name = "driver" id="driver">
                                <div>
                                    <input class="btn" type="button" value="Añadir Parada" id="addDest"/>
                                </div>
                                
                                <br>
                                <input class="btn" type="submit" value="Crear" id = "createBtn">
                            </form>
                        </div>
                    </div>
                </div>
				
		<!--MIS TRAYECTOS-->
                <div class="journeys-container">
                    <div class = "journeys-content">
                        <h1 class = "section-title">Viajes</h1>
						<div class = "journeys-content" id="journeys">
                       	</div>
                    </div>
                </div>
				
				<!--CANCELAR/BORRAR-->
                <div class="journeys-container">
                    <div class = "journeys-content">
                        <h1 class = "section-title">Cancelar / Borrar / Modificar Viajes</h1>
						<div class = "journeys-content" id="select-container">
							
							Cancelar (tiene pasajeros apuntados)
							<select class="form-control" id="cancel">
								<option>---</option>
                            </select>
							<input type="button" value="Cancelar" id="cancelButton"/>
							
							<br>
							<br>
							Borrar o Modificar (no tiene pasajeros apuntados)
							<select class="form-control" id="delete">
								<option>---</option>
                            </select>
							<input type="button" value="Borrar" id="deleteButton"/>
							<input type="button" value="Modificar" id="modifyButton"/>
							<form id="modifySection" action="../operations/modifyTrip.php" method="post">
								<input type="hidden" name="hdnTrip" id="hdnTrip" value=""/>
								<input type="hidden" name="hdnNJourneys" id="hdnNJourneys" value=""/>
							</form>
                       	</div>
                    </div>
                </div>
				
				
				 <!--VALORACIONES-->
                <div class="score-container">
              
                    <div class = "scores-content">
                        <h1 class = "section-title">Mis valoraciones</h1>
                            <div class = "average" id="divAverage">

                            </div>
							<div class = "comments" id="divComments">
								
							</div>
                    </div>
                </div>
           
        </main>
        <!--chat estructura-->
        <aside class="tabbed_sidebar ng-scope chat_sidebar popup-box-on" id="sidebar_secondary">
            <div class="popup-head">
                <div class="popup-head-left pull-left">
                    <a design="" and="" developmenta="" target="_blank" id="Foto"></a>
                </div>
                <div class="popup-head-right pull-right">
                    <div class="btn-group gurdeepoushan">
                        <button class="chat-header-button" id="actualizarChat" type="button" alt="Actualizar" title="Actualizar">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </button>
                        <button class="chat-header-button pull-right" id="removeClass" data-widget="remove" type="button" alt="Cerrar" title="Cerrar chat">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="chat_box_wrapper chat_box_small chat_box_active" id="chat">
                <div class="chat_box touchscroll chat_box_colors_a" id="mensajes">
                    
                </div>
            </div>
            <div class="chat_submit_box">
                <div class="uk-input-group">
                    <div class="gurdeep-chat-box">
                        <input class="md-input" id="submit_message" type="text" placeholder="Escriba un mensaje..." name="submit_message">
                    </div>
                    <a class="btn btn-success btn-sm" id="enviarMensaje">
                        <span class="glyphicon gglyphicon-comment"></span> Enviar</a>
                </div>
            </div>
        </aside>

</body>

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
