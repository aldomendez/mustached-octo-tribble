<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aldo Mendez Reyes">
    <meta name="description" content="Control de Process Checks">
    <!-- Favicon, que por cierto aun no hago
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png"> -->

  <title>Control de Process Checks</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link href="jumbotron-narrow.css" rel="stylesheet"> -->
</head>
<body>
<div class="container">
<!-- header
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="header">
    <ul class="nav nav-pills pull-right hidden-xs">
      <li class="active"><a href="#/">ProcessChecks</a></li>
      <li><a href="#/celda">Resultados</a></li>
      <!-- <li><a href="#/todas">Todas</a></li> -->
      <!-- <li><a href="#/comentarios">Comentarios</a></li> -->
    </ul>
    <h3 class="text-muted">Control de Process Checks</h3>
  </div>
  <div class="row">
    <div class="breadcrumbs">
      <ol class="breadcrumb" data-bind="foreach:path">
        <li><a href="#" data-bind="text:$data"></a></li>
      </ol>
    </div>
  </div>
<!-- Formulario de ProcessChecks con Knockout Bindings
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="row" id="machine-setup">
    <form role="form">
      <legend>Datos de Process Checks <small data-bind="text:processSelected"></small></legend>
      <div class="machines-list" data-bind="foreach:process">
        <div class="radio">
          <label class="radio-inline">
            <input type="radio" id="env-1" name="process" value="prod" data-bind="value:name,click:$root.log"><span data-bind="text: name"></span>
          </label>
        </div>
      </div>
      <!-- 
        Formulario inecesario

      <div class="form-group">
        <label for="bonder-name">Nombre</label>
        <input class="form-control" type="text" id="bonder-name" placeholder="Ingresa el nombre de la Maquina"></input>
      </div>
      <a href="#/" class="btn btn-default" id="save-machine-data">Guardar</a>
    </form> -->
  </div>

<!-- Footer
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="footer">
    <p>&copy; Avago Tech 2013</p>
  </div>

</div> <!-- /container -->

<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/underscore-1.5.2.min.js"></script>
<script type="text/javascript" src="js/knockout-3.0.0.js"></script>
<script type="text/javascript" src="js/processchecks.knockout.js"></script>
<!-- <script type="text/javascript" src="js/sammy.js"></script> -->
<!-- <script type="text/javascript" src="js/backbone-1.1.0min.js"></script> -->
<!-- <script type="text/javascript" src="js/stopwatch.js"></script> -->
<!-- <script type="text/javascript" src="js/moment.js"></script> -->
<!-- <script type="text/javascript" src="js/xdate.js"></script> -->
<script type="text/javascript" src="js/app.js"></script>
<script>
  $(function () {
      // sammy.run('#/');
      // window.app = new App('<?php echo $_SERVER['REMOTE_ADDR']; ?>');
  });
</script>
</body>
</html>