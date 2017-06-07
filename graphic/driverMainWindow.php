<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Conductor</title>
        <link rel="stylesheet" type="text/css" href="../resources/theme/css/driverMainWindowStyle.css">
        <link rel="stylesheet" type="text/css" href="../resources/theme/css/chat.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script type='text/javascript' src='../logic/driverMainWindowLogic.js'></script>

        <script src="../logic/chatLogic.js"></script>
		 <link rel="stylesheet" type="text/css" href="../resources/theme/css/chat.css">
		
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
      				</button>
      				<a class="navbar-brand" href="#" id = "iconButton">
                        <img src="../resources/car.png">
                    </a>
    			</div>
			    <!-- nav links-->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      	<ul class="nav navbar-nav">
			        	<li class="active journeys-button"><a href="#">
			        		Ver trayectos 
			        	</a></li>
			        	<li><a href="#" class = "create-button">
			        		Crear trayecto
			        	</a></li>
			        	<li><a class = "score-button" href="#">
			        		Mis valoraciones
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
				<!--CREAR NUEVO TRAYECTO-->

				<div class = "create-container">
					<h1 class = "create-title">Datos del viaje</h1>
	                <div class = "create-content">
	                    <div class="well-content">
	                    <form class="form-horizontal" role="form">

	                            <label>Origen</label>
	                            <input class="form-control" placeholder="Origen" name="origin" type="text" id="origin" required/>
	                     
	                            <label>Destino</label>
	                            <input class="form-control" placeholder="Origen" name="origin" type="text" id="origin" required/>

		                        <div class="input-group date"  data-provide = "datepicker" id = "datepicker">
		                            <input type="text" class="form-control" placeholder="Fecha" name="date" id="date" required>
		                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
		                        </div>
	                        <!-- TODO AQUI VA LA FECHA -->
	                        <br>
	                        <input class="btn" type="submit" value="Crear" id = "createBtn">
	                    </form>
	                </div>
	                </div>
            </div>

				</div>
				
				<!--MIS TRAYECTOS-->
                <div class="journeys-container">
                    <div class = "journeys-content">
                        <h1 class = "section-title">Viajes</h1>
						<div class = "journeys-content">
							<p>Aqui salen todos los trayectos del conductor con lasplantilals</p>
                       	</div>
                    </div>
                </div>
				
				 <!--VALORACIONES-->
                <div class="score-container">
              
                    <div class = "scores-content">
                        <h1 class = "section-title">Mis valoraciones</h1>
                            <div class = "average">

                            </div>
							<div class = "comments">
								
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
            <div class="chat_box_wrapper chat_box_small chat_box_active" id="chat" style="opacity: 1; display: block; transform: translateX(0px);">
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