<?php  
    session_start(); /* Verificar inicio de sesion*/
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }

    /*Consultas BD para autocompletado de formularios*/
    include_once("librerias/php/conexion.php");
    $query = "SELECT * FROM usuario";
    $rs = mysql_query($query);
    $num = mysql_num_rows($rs);
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
</head>
<body>
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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="" onClick="cargar_ingresar();">Ingresar<span class="sr-only">(current)</span></a></li>
        
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
  </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid" id="contenido" >
  <div class="row">
    
    <div class="col-md-12 col-sm-12 col-xs-12">
   	 <h3>Ingreso de datos</h3>
    	<div class="panel panel-primary">
  			<div class="panel-heading">
    			<h4>Datos Generales</h4>
  		</div>
  		<div class="panel-body">
    <!-- INICIO DEL CUERPO DEL FORMULARIO-->
    		<div class="col-md-4">
                            <div class="form-group">
                                            <label>Departamento</label>
                                            <select class="form-control" id="deshabilitado" disabled="deshabilitado">
                                                <option>La Libertad</option>
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                                <option></option>
                                            </select>
                         </div>
                         </div>

                          <div class="col-md-4">
                            <div class="form-group">
                                            <label>Municipio</label>
                                            <select class="form-control" id="deshabilitado" disabled="deshabilitado">
                                                <option>Nuevo Cuscatlan</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                         </div>
                         </div>

                         <div class="col-md-4">
                            <div class="form-group">
                                            <label>Colonia/Barrio/Caserio/Residencial</label>
                                            <select class="form-control">
                                                <option>Colonia La Esperanza #1</option>
                                                <option>Colonia La Esperanza #2</option>
                                                <option>Colonia 7 de Marzo</option>
                                                <option>Barrio El Centro</option>
                                                <option>Residencial Via del Mar</option>
                                            </select>
                         </div>
                         </div>

                        
                        <div class="container-fluid">
                        	    <div class="row">
                           			<div class="col-md-2">
                            			<div class="form-group">
                                            <label>Area</label>
                                            <input class="form-control" id="campoDeshabilitado" type="text" placeholder="Urbana" disabled>
                         				</div>
                        			 </div>

                        			 	<div class="col-md-6">
                            				<div class="form-group">
                                            	<label>Pasaje/Poligono/Senda/Etc.</label>
                                            <input class="form-control" type="text" placeholder="Escriba su direccion aqui">
                         					</div>
                        			 	</div>

                        			 	<div class="col-md-2">
                            			<div class="form-group">
                                            <label>Numero de Vivienda</label>
                                            <input class="form-control" id="campoDeshabilitado" type="text" placeholder="Escriba el Numero">
                         				</div>
                        			 </div>
                        	
                        	
                        		</div>                        	
                        </div>
						

					    <div class="container-fluid">
                        	    <div class="row">
                           			<div class="col-md-3">
                            			<div class="form-group">
                                           <label>Religion</label>
                                            <select class="form-control">
                                                <option>Catolicos</option>
                                                <option>Evangelicos</option>
                                                <option>Testigos de Jehova</option>
                                                <option>Adventistas</option>
                                                <option>Mormonesx		</option>
                                            </select>
                         				</div>
                        			 </div>
                        			 </div>
                        	
                        	
                        		</div>                        	
                        </div>
  		</div>
</div>
    
    
      
    </div>
  </div>
</div>
<!-- FOOTER DEL SISTEMA-->
<footer>
	<div class="container">
		<div class="col-md-12 col-xs-12">
			<h5 class="text-center">Footer</h5>
		</div>
  </div>	
</footer>
		
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="http://code.jquery.com/jquery-latest.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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

