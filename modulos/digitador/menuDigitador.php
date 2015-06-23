<?php  
    session_start(); /* Verificar inicio de sesion*/
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }   
?>
<script src="librerias/js/cargarFormularios.js"></script>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ingresar Censo&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li role="presentation" class="dropdown-header">Viviendas</li>
            <li><a href="#" onClick="cargarCensada();">Viviendas Censadas<span class="sr-only">(current)</span></a></li>
            <li><a href="#" onClick="cargarNoCensada();">Viviendas No Censadas<span class="sr-only">(current)</span></a></li>
          </ul>
        </li>
        <li ><a href="" onClick="">Consultas por vivienda<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas Generales&nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li role="presentation" class="dropdown-header">Por Categoria</li>
            <li><a href="#" onClick="cargarBusquedaReligion();">Religion</a></li>
            <li><a href="#" onClick="cargarBusquedaTenencia();">Tenencia de Vivienda</a></li>
            <li><a href="#" onClick="cargarBusquedaTipoFamilia();">Tipo de Familia</a></li>
          </ul>
        </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user text-default"></i>&nbsp;Bienvenido &nbsp;<?php echo $_SESSION['usuario']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="librerias/php/cerrarSesion.php">Cerrar Sesion</a></li>
          </ul>
        </li>
        </ul>
</div><!-- /.navbar-collapse -->