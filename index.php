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
    <ul class="nav nav-pills pull-right">
      <li class="active"><a href="#/">Reset Page (dev only)</a></li>
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
    <form role="form" id="form" method="post" action="formHandler.php" name="formElement">
    </form>
  </div>

<div id="brdcmps-template" class="hidden">
<!-- Template: Lista para seleccionar procesos
++++++++++++++++++++++++++++++++++++++++++++ -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="btn-group btn-group-justified">
        {{~it:proceso:index}}
        {{? proceso.componentes}}<a class="btn btn-default" href="#/capture/{{=index}}" >{{=proceso.name}}</a>{{?}}
        {{~}}
      </div>
    </div>
    <div class="panel-body" id="process-help">
      <div class="alert alert-info">Selecciona el proceso de la lista de arriba</div>
    </div>
  </div>
</div>

<div id="form-template" class="hidden">
<!-- Template: Formulario 
++++++++++++++++++++++++++++++++++++++++++++ -->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><small>Process Checks</small> {{=it.name}}</h3>
    </div>
    <ul class="list-group">
      {{? it.componentes }} <!-- Si tiene componentes configurados: -->
      <li class="list-group-item">
        <div class="machines-list">{{~it.bonders:value:index}}
          <label class="checkbox-inline">
            <input type="radio" value="{{=value}}" name="system_id">{{=value}}
          </label>{{~}}
        </div>
      </li>
      <input type="hidden" name="process" value="{{=it.name}}">

      <li class="list-group-item">
      <div class="row">
        <div class="col-sm-6">
          <div class="input-group input-group-sm">
            <span class="input-group-addon">Numero de serie</span>
            <input type="text" class="form-control" name="serial_num" placeholder="Numero de serie para rastreabilidad">
          </div>
        </div>
        <div class="col-sm-6"> 
          <div class="input-group input-group-sm">
            <span class="input-group-addon">Usuario</span>
            <input type="text" class="form-control" name="user_id" placeholder="Numero de Usuario">
          </div>
        </div>
      </div>
      </li>

      {{~it.componentes:value:index}}
      <li class="list-group-item">
        <div class="input-group input-group-sm">
          <span class="input-group-addon">{{=value.name}}</span>
          <input type="text" class="form-control" name="{{=value.name}}" id="{{=value.name}}" placeholder="Valor minimo de control: {{=value.lcl}}">
        </div>
      </li>
      {{~}}

      <li class="list-group-item">
        <label for="inputEmail3" class="col-sm-2 control-label">Comentarios</label>
        <input type="text" class="form-control" name="comment" placeholder="Proporciona comentarios de acuerdo a lo observado en las pruebas">
      </li>
      
      <li class="list-group-item hidden" id="alert-box">
        <p class="alert alert-warning"></p>
      </li>

      <li class="list-group-item">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
      </li>

      {{??}} <!-- Si no tiene componentes configurados: -->
      <div class="alert alert-info">
        <p><span class="glyphicon glyphicon-info-sign"></span> Este elemento no esta correctamente configurado</p>
      </div>
      {{?}}

    </ul>
  </div><!-- /Panel -->


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
<script type="text/javascript" src="js/doT.min.js"></script>
<script type="text/javascript" src="js/validate.min.js"></script>
<script type="text/javascript" src="js/sammy.js"></script>
<!-- <script type="text/javascript" src="js/backbone-1.1.0min.js"></script> -->
<!-- <script type="text/javascript" src="js/stopwatch.js"></script> -->
<!-- <script type="text/javascript" src="js/moment.js"></script> -->
<!-- <script type="text/javascript" src="js/xdate.js"></script> -->
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>