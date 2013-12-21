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
<!-- Formulario de ProcessChecks con Knockout Bindings
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="row" id="machine-setup">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#" >Proceso</a></li>
        <li><a href="#" >Cancelar</a></li>
      </ol>
    </div>
    <form role="form" id="form">
    </form>
  </div>

<script id="form-template" type="doT-Template">
<legend>Datos de Process Checks {{=it.name}}</legend>

<div class="machines-list">{{~it.bonders:value:index}}
  <div class="radio">
    <label class="radio-inline">
      <input type="radio" name="process" value="prod"><span>{{=value}}</span>
    </label>
  </div>{{~}}
</div>

{{~it.componentes:value:index}}
<div>{{=value.name}}!<small>{{=value.lcl}}</small></div>
{{~}}
</script>

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
<script type="text/javascript" src="js/doT.min.js"></script>
<!-- <script type="text/javascript" src="js/sammy.js"></script> -->
<!-- <script type="text/javascript" src="js/backbone-1.1.0min.js"></script> -->
<!-- <script type="text/javascript" src="js/stopwatch.js"></script> -->
<!-- <script type="text/javascript" src="js/moment.js"></script> -->
<!-- <script type="text/javascript" src="js/xdate.js"></script> -->
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>