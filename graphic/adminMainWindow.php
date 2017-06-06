<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="../resources/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="../logic/adminMainWindowLogic.js"></script>
    <link rel="stylesheet" type="text/css" href="../resources/theme/css/adminMainWindow.css">
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
                    <a class="navbar-brand" href="#">
                        <img src="../resources/car.png">
                    </a>
                </div>
              </div>
            </nav>
        </header>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-login">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6"><a class="active" id="conductores-link" href="#">Conductores</a></div>
                  <div class="col-xs-6"><a id="usuarios-link" href="#">Usuarios</a></div>
                </div>
                <hr>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <form id="conductores">
                      <table class="table table-bordered table-hover" id="tab_conductores">
                        <thead>
                          <tr>
                            <th class="text-center"></th>
                            <th class="text-center">name</th>
                            <th class="text-center">email</th>
                            <th class="text-center">username</th>
                            <th class="text-center">telefono</th>
                            <th class="text-center">dni</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Comentarios</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </form>
                    <form id="usuarios">
                      <table class="table table-bordered table-hover" id="tab_usuarios">
                        <thead>
                          <tr>
                            <th class="text-center"></th>
                            <th class="text-center">name</th>
                            <th class="text-center">email</th>
                            <th class="text-center">username</th>
                            <th class="text-center">telefono</th>
                            <th class="text-center">dni</th>
                            <th class="text-center">Foto</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>

 <!-- Modal content-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" id="modalHeader">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">


        <table class="table table-bordered table-hover" id="tab_comentarios">
        <thead>
          <tr>
          <th class="text-center">name</th>
          <th class="text-center">Comentario</th>
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