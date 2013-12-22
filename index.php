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
      <!-- <li><a href="#/celda">Resultados</a></li> -->
      <!-- <li><a href="#/todas">Todas</a></li> -->
      <!-- <li><a href="#/comentarios">Comentarios</a></li> -->
    </ul>
    <h3 class="text-muted">Control de Process Checks</h3>
  </div>
<!-- Holder para los elementos que voy a crear
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="row" id="machine-setup">
    <div class="breadcrumbs" id="brdcmps">
    </div>
    <form role="form" id="form">
    </form>
  </div>

<!-- Template: Lista de procesos seleccionable
++++++++++++++++++++++++++++++++++++++++++++ -->
<script id="brdcmps-template" type="doT-Template">
  <ol class="breadcrumb">
    {{~it:proceso:index}}
    {{? proceso.componentes}}<li><a href="#/capture/{{=index}}" >{{=proceso.name}}</a></li>{{?}}
    {{~}}
  </ol>
</script>

<!-- Template: Formulario 
++++++++++++++++++++++++++++++++++++++++++++ -->
<script id="form-template" type="doT-Template">
<h2><small>Process Checks</small> {{=it.name}}</h2>
{{? it.componentes }}
<div class="machines-list">{{~it.bonders:value:index}}
  <div class="radio">
    <label class="radio-inline">
      <input type="radio" name="process" value="{{=value}}"><span>{{=value}}</span>
    </label>
  </div>{{~}}
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Maquina</label>
  <div class="col-sm-10">
    <input type="email" class="form-control" id="machine" placeholder="">
  </div>
</div>
{{~it.componentes:value:index}}

<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">{{=value.name}}</label>
  <div class="col-sm-10">
    <input type="email" class="form-control" id="{{=value.name}}" placeholder="Valor mas bajo: {{=value.lcl}}">
  </div>
</div>

{{~}}
<button type="submit" class="btn btn-default">Guardar</button>
{{??}}
<div class="alert alert-info"><p><span class="glyphicon glyphicon-info-sign"></span> Este elemento no esta correctamente configurado</p>
</div>
{{?}}
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
<script type="text/javascript" src="js/sammy.js"></script>
<!-- <script type="text/javascript" src="js/backbone-1.1.0min.js"></script> -->
<!-- <script type="text/javascript" src="js/stopwatch.js"></script> -->
<!-- <script type="text/javascript" src="js/moment.js"></script> -->
<!-- <script type="text/javascript" src="js/xdate.js"></script> -->
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>