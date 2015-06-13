<?php  
    session_start(); /* Verificar inicio de sesion*/
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }

    /*Consultas BD para autocompletado de formularios*/
    include_once("librerias/php/conexion.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Plantilla Principal</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- Estilos Bootstrap -->
  <link rel="stylesheet" href="librerias/css/bootstrap.css">
  <link rel="stylesheet" href="librerias/css/bootstrap-theme.css">
  <!-- Estilos Personalizados -->
  <link rel="stylesheet" type="text/css" href="librerias/css/style.css">
  <!-- Estilos ccs Font-awesome -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <!-- Datepciker -->
  <script type="text/javascript" src="librerias/js/zebra_datepicker.js"></script>
  <script type="text/javascript" src="librerias/js/zebra_datepicker.src.js"></script>
  <link rel="stylesheet" href="librerias/css/default.css" type="text/css">
  <script type="text/javascript" src="librerias/js/funcionesDatepicker.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<body onload="cargarPagina(<?php echo $_SESSION['tipo_rol']?>)">
	<!-- HEADER DEL SISTEMA -->
<header>
	<div class="container-fluid">
		<div class="visible-md visible-lg col-md-2">
			<div class="logo">
				<img src="" class="img-responsive img-circle" alt="Responsive image">
			</div>
		</div>
  
		<div class="col-md-8 text-center">
			<h2 class="titulo1"><b>SISTEMA DE REGISTRO DE POBLACION Y VIVIENDAS</b></h2>
			<h4 class="titulo2">DEPARTAMENTO DE DESARROLLO SOCIAL</h4>	
		</div>
		<div class="visible-md visible-lg col-md-2 text-right">
			<div class="logoe">
				<img src="" class="img-responsive" alt="Responsive image">
			</div>	
		</div>
	</div>
</header>
  <!-- NAVBAR DEL SISTEMA-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand active" href="principal.php">INICIO</a>
    </div>
    <!-- MENU DEL SISTEMA-->
    <div  id="menu">
     
    </div>
  </div><!-- /.container-fluid -->
</nav>
<!-- CONTENIDO DEL SISTEMA -->
<div class="container-fluid" id="contenido" >
  
</div>
<!-- FOOTER DEL SISTEMA-->
<footer>
	<div class="container">
		<div class="col-md-12 col-xs-12 visible-sm visible-md visible-lg ">
			<h5 class="text-center">Footer</h5>
		</div>
  </div>	
</footer>
		
	<script src="librerias/js/jquery-1.11.3.js"></script>
  <script src="librerias/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="librerias/js/bootstrap.js"></script>
  <script src="librerias/js/cargarPrincipal.js"></script>
  <script type="text/javascript">
  $("#alerta").hide();

    $("#ingresar-datos").submit(function(event){

    event.preventDefault(); /*evitamos que se recarge la página*/
    $.ajax({
        type: "POST",
        url: "registrarDatos.php",
        data: { 
          nombre: $('#nombre').val(),
          apellido: $('#apellido').val(), },
               
        success: function(respuesta){ 
                                        
          if(respuesta=="true"){
            $("#alerta").show();
            $("#alerta").html("Datos registrados exitosamente");
            document.getElementById('alerta').className="alert alert-success";
            $("#alerta").fadeOut(4000);
            $("#ingresar-datos")[0].reset()

          }
          else{

            $("#alerta").show();
            $("#alerta").html("No se registraron los datos");
            document.getElementById('alerta').className="alert alert-danger";
            $("#alerta").fadeOut(4000);
            $("#ingresar-datos")[0].reset()
                          } 
      }//fin del succes function
    }); //fin del ajax  
  });
  </script>
  </body>
</html>

