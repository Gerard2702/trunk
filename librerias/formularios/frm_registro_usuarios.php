 <script type="text/javascript" src="librerias/js/bootstrap-multiselect.js"></script>
  <script type="text/javascript" src="librerias/js/bootstrap-multiselect-collapsible-groups.js"></script>
 
  <link rel="stylesheet" href="librerias/css/bootstrap-multiselect.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <?php  
    session_start(); /* Verificar inicio de sesion*/
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }

    /*Consultas BD para autocompletado de formularios*/
    include_once("../php/conexion.php");

    /*recupera la colonia y el area*/
    $query = "SELECT id_area,nombre from colonia";
    $rs = mysql_query($query);
    $num = mysql_num_rows($rs);

?>
<div class="container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <h3>REGISTRO DE USUARIOS</h3>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4>Datos de Registro</h4>
      </div>
      <div class="panel-body">
                <!-- INICIO DEL CUERPO DEL FORMULARIO-->
                <!-- Build your select: -->
<select id="example-getting-started" multiple="multiple">
    <option value=''>Seleccione una Colonia</option>
                                                <?php 
                                                   if($num>0){
                                                      while($filas = mysql_fetch_array($rs)){
                                                    echo "<option value='".$filas['nombre']."'>".$filas['nombre']."</option>";}
                                                   }else{
                                                     echo "<option value='0'>No hay registros</option>";
                                                   }
                                                   ?>

</select>
<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#example-getting-started').multiselect({

includeSelectAllOption: true

});
    });
</script> 
                <form class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-xs-3">Nombre de Usuario:</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="usuario" placeholder="Nombre de Usuario" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Contraseña:</label>
                <div class="col-xs-9">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña" required  >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Confirmar Contraseña:</label>
                <div class="col-xs-9">
                    <input type="password" class="form-control" placeholder="Confirmar Contraseña" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Nombre:</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" placeholder="Nombre" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Apellido:</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" placeholder="Apellido" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" >Telefono:</label>
                <div class="col-xs-9">
                    <input type="tel" class="form-control" placeholder="Telefono">
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-xs-3">Cargo en Departamento:</label>
                <div class="col-xs-6">
                    <select class="form-control">
                        <option>Gerente</option>
                        <option>Supervisor</option>
                        <option>Digitador</option>
                        <option>Recepcionista</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Rol Asignado en el Sistema:</label>
                <div class="col-xs-6">
                    <select class="form-control">
                        <option>Administrador</option>
                        <option>Digitador</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3">Genero:</label>
                <div class="col-xs-3">
                    <label class="radio-inline">
                        <input type="radio" name="genderRadios" value="male"> Maculino
                    </label>
                </div>
                <div class="col-xs-2">
                    <label class="radio-inline">
                        <input type="radio" name="genderRadios" value="female"> Femenino
                    </label>
                </div>
            </div>
           
            <hr>
            <div class="form-group">
                <div class="col-xs-offset-3 col-xs-9 text-right">
                    <input type="submit" class="btn btn-primary" value="Registrar">
                    <input type="reset" class="btn btn-default" value="Limpiar">
                </div>
            </div>
        </form>                       
      </div>
    </div>
  </div>
</div>
</div>
