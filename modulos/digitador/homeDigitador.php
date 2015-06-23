<?php
session_start();
$usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }

?>		

 <div class="row">
 	<div class="col-md-12 col-sm-12 col-xs-12">
 	<img class="img-responsive" alt="Responsive image" src="librerias/imagenes/canvas.png" alt="">
 	</div>
 </div>
