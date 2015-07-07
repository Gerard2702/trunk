<?php 
	//Desarrollado por: Gerardo Orellana
    //verificar si mi session aún existe, si existe entonces que no nos deje pasar a index, 
    // y la redireccionamos a principal hasta q la session se destruya
    session_start();
    if(isset($_SESSION['usuario'])){
        header("Location: principal.php");
    }
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

<body id="inicio">

	<div class="container-fluid">
		<div class="row" >
			<div id="box" class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
				<div class="row" id="header-login">
					<div class="text-center col-md-12" >
						<h2 >SISTEMA DE REGISTRO POBLACIONAL</h2>
						<h3 >Alcaldia de Nuevo Cuscatlan</h3>
					</div>
				</div>
					<br>
					<h4 class="text-center">INICIAR SESION</h4>
					<br>
				<div  class="col-md-6 col-md-offset-3">
					<form class="form-signin"  id="login">
						<div class="form-group">
							<label  class="sr-only" for="inputUser">Usuario:</label>
							<div class="input-group">
								<div class="input-group-addon"><span class="fa fa-user"></span></div>
								<input id="inputUser"  name="inputUser" title="usuario" class="form-control" type="text" autofocus="" required="" placeholder="Usuario">
							</div>
						</div>
						<div class="form-group">
							<label  class="sr-only" for="inputPassword">Contraseña:</label>
							<div class="input-group">
								<div class="input-group-addon"><span class="fa fa-key"></span></div>
								<input id="inputPassword" name="inputPassword" title="contraseña" class="form-control" type="password" required="" placeholder="Contraseña">
							</div>	
						</div>
						<!-- Mensaje de Alerta -->
						<div id="alerta">
							<p class="text-danger conten-alert"></p>
						</div>
						<button class="btn btn-lg btn-primary btn-block" id="btn-login" type="submit">Ingresar</button>	
					</form>
			    </div>
			</div>
		</div>		
    </div>
	
	<!-- Scripts -->
	<script src="librerias/js/jquery-1.11.3.js"></script>
	<script src="librerias/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="librerias/js/bootstrap.js"></script>
	<script type="text/javascript" src="librerias/js/login.js"></script>
	<script type="text/javascript">
	/*ocultas el div con el id alerta*/
	$("#alerta").hide(); 
	</script>
</body>
</html>

