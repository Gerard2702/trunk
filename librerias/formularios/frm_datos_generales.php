<script src="librerias/js/cargarFormularios.js"></script>
<script src="librerias/js/funcionesFrmgenerales.js"></script>
<?php  
    session_start(); /* Verificar inicio de sesion*/
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }

    /*se incluye la conexion con la base de datos*/
    include_once("../php/conexion.php");

    /*Sentencias para recuperar los datos para los select*/
    $query = "SELECT id_area,nombre from colonia order by nombre;";
    $rs = mysql_query($query);
    $num = mysql_num_rows($rs);

    $sqltenencia = "SELECT nombre from tenencia_vivienda";
    $rstenencia= mysql_query($sqltenencia);
    $numtenencia = mysql_num_rows($rstenencia);

    $sqlreligion = "SELECT nombre from religion order by nombre;";
    $rsreligion = mysql_query($sqlreligion);
    $numreligion = mysql_num_rows($rsreligion);

    $sqltipofamilia = "SELECT nombre from tipo_familia order by nombre;";
    $rstipofamilia = mysql_query($sqltipofamilia);
    $numtipofamilia = mysql_num_rows($rstipofamilia);

    $sqlseguridad = "SELECT nombre from seguridad";
    $rsseguridad = mysql_query($sqlseguridad);
    $numseguridad = mysql_num_rows($rsseguridad);
    

    /*Inicializa las variables en caso que no esten declaradas*/
    $fecha_censo="";
    $nom_colonia= "Seleccione una Colonia";
    $pasaje ="";
    $tenencia="Seleccione una Tenencia";
    $num_vivienda="";
    $can_familias="";
    $religion ="Seleccione una Religion";
    $tipo_familia="Seleccione una Familia";
    $seguridad ="Seleccione una Seguridad";
    $vectores ="";
    $perros=0;
    $gatos=0;
    $otros=0;
    $observaciones ="";

    /* inicializamos variables del formulario 1 que están en la sesión, por ejemplo, si volví del formulario 2 al 1 */
    if (!empty($_SESSION['fecha_censo'])){
    $fecha_censo = $_SESSION['fecha_censo'];
    $nom_colonia = $_SESSION['nom_colonia'];
    $pasaje = $_SESSION['pasaje'];
    $num_vivienda = $_SESSION['num_vivienda'];
    $can_familias = $_SESSION['can_familias'];
    $religion = $_SESSION['religion'];
    $tipo_familia = $_SESSION['tipo_familia'];
    $seguridad = $_SESSION['seguridad'];
    $vectores = $_SESSION['vectores'];
    $perros = $_SESSION['perros'];
    $gatos = $_SESSION['gatos'];
    $otros = $_SESSION['otros'];
    $observaciones = $_SESSION['observaciones'];
    };
?>

<!--INICIO DEL CUERPO DEL FORMULARIO -->
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
     <h3>INGRESO DE DATOS</h3>
      <div class="panel panel-primary">
        <div class="panel-heading">
          Datos Generales
        </div>
        <div class="panel-body">
          <!-- INICIO DEL CUERPO DEL FORMULARIO-->
          <form class="form-signin"  id="ingresar-generales" method="post">
            
          <div class="container-fluid">
            <div class="row">
            <div class="col-md-4" >
            <div class="form-group">
            <label>Fecha de Censado</label>
             <input class="form-control datepicker" type="date" id="fecha-censado" required>
             </div>
            </div>
                       
          </div> 
          </div>
           <div class="container-fluid">
              <div class="row">
               <div class="col-md-3">
                    <div class="form-group">
                        <label>Departamento</label>
                        <select class="form-control" id="departamento" disabled="deshabilitado" required>
                          <option>La Libertad</option>
                          <option></option>
                          <option></option>
                          <option></option>
                          <option></option>
                        </select>
                    </div>
                  </div> 
            <div class="col-md-3">
                  <div class="form-group">
                      <label>Municipio</label>
                        <select class="form-control" id="municipio" disabled="deshabilitado" required>
                         <option>Nuevo Cuscatlan</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                  </div>
                </div> 
               
              </div>                          
            </div>

          <div class="container-fluid">
            <div class="row">
             <div class="col-md-3">
                  <div class="form-group">
                    <label>Colonia/Barrio/Caserio/Residencial</label>
                    <select type="text" class="form-control" id="colonia" onchange="verificarArea();" required >
                     <option <?php if($nom_colonia=="Seleccione una Colonia"){ ?> value=''<?php } else { ?>value='<?php echo $nom_colonia;?>'<?php }?>><?php echo $nom_colonia;?></option>
                        <?php 
                            if($num>0){
                               while($filas = mysql_fetch_array($rs)){
                            echo "<option value='".$filas['nombre']."'>".$filas['nombre']."</option>";}
                            }else{
                              echo "<option value='0'>No hay registros</option>";
                            }
                            ?>
                    </select>
                    <div id="alerta">
                        <p class="text-danger conten-alert"></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                      <label>Pasaje/Poligono/Senda/Etc.</label>
                      <input class="form-control" type="text" id="pasaje" placeholder="Escriba su direccion aqui" value="<?php echo $pasaje;?>" required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Numero de Vivienda</label>
                    <input class="form-control" id="numvivienda" pattern="[0-9]{1,10}" title="Escriba un numero" type="text" placeholder="Escriba el Numero" value="<?php echo $num_vivienda;?>" required>
                </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Area</label>
                    <input class="form-control" id="area" value=""type="text" placeholder="Area" disabled required>
                  </div>
                </div>
            </div>                          
          </div>
            
        <hr>
          <div class="container-fluid">
            <div class="row">
            
              <div class="col-md-3">
                 <div class="form-group">
                  <label>Tipo de Familia</label>
                  <select type="text" class="form-control" id="tipo_familia" required >
                     <option <?php if($tipo_familia=="Seleccione una Familia"){ ?> value=''<?php } else { ?>value="<?php echo $tipo_familia;?>"<?php }?>><?php echo $tipo_familia;?></option>
                        <?php 
                            if($numtipofamilia>0){
                               while($filastipofamilia = mysql_fetch_array($rstipofamilia)){
                            echo "<option value='".$filastipofamilia['nombre']."'>".$filastipofamilia['nombre']."</option>";}
                            }else{
                              echo "<option value='0'>No hay registros</option>";
                            }
                            ?>
                    </select>
              </div>
              </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Cantidad de Familias</label>
                  <input class="form-control" id="numfamilia" pattern="[0-9]{1,10}" type="text" placeholder="Escriba el Numero" value="<?php echo $can_familias;?>" required>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Religion</label>
                    <select type="text" class="form-control" id="religion" required >
                     <option <?php if($religion=="Seleccione una Religion"){ ?> value=''<?php } else { ?>value="<?php echo $religion;?>"<?php }?>><?php echo $religion;?></option>
                        <?php 
                            if($numreligion>0){
                               while($filasreligion = mysql_fetch_array($rsreligion)){
                            echo "<option value='".$filasreligion['nombre']."'>".$filasreligion['nombre']."</option>";}
                            }else{
                              echo "<option value='0'>No hay registros</option>";
                            }
                            ?>
                    </select>
                </div>
              </div>
          
            </div>
          </div>  
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                  <div class="form-group">
                    <label>Tenencia</label>
                    <select type="text" class="form-control" id="tenencia" onchange="verificarArea();" required >
                     <option <?php if($tenencia=="Seleccione una Tenencia"){ ?> value=''<?php } else { ?>value='<?php echo $tenencia;?>'<?php }?>><?php echo $tenencia;?></option>
                        <?php 
                            if($numtenencia>0){
                               while($filastenencia = mysql_fetch_array($rstenencia)){
                            echo "<option value='".$filastenencia['nombre']."'>".$filastenencia['nombre']."</option>";}
                            }else{
                              echo "<option value='0'>No hay registros</option>";
                            }
                            ?>
                    </select>
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                  <label>Seguridad</label>
                  <select type="text" class="form-control" id="seguridad" required >
                     <option <?php if($seguridad=="Seleccione una Seguridad"){ ?> value=''<?php } else { ?>value="<?php echo $seguridad;?>"<?php }?>><?php echo $seguridad;?></option>
                        <?php 
                            if($numseguridad>0){
                               while($filasseguridad = mysql_fetch_array($rsseguridad)){
                            echo "<option value='".$filasseguridad['nombre']."'>".$filasseguridad['nombre']."</option>";}
                            }else{
                              echo "<option value='0'>No hay registros</option>";
                            }
                            ?>
                    </select>
              </div>
              </div>

            </div>
          </div>
<hr>
                 <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-3"> 
                        <div class="form-group has-feedback">
                              <label>Vectores y Mascotas</label>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vector[]" value="zancudos">Zancudos
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vector[]" value="moscas">Moscas
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vector[]" value="chinches">Chinches Picudas
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vector[]" value="cucacachas">Cucarachas
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vector[]" value="Roedores">Roedores
                                                </label>
                                            </div>
                                          </div>
                    </div>

                    <div class="col-md-3">
                    <div class="form-group">

                          <label>Perros</label>
                          <select class="form-control" type="text" id="perros" required>
                                  <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>5</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                  <option>8</option>
                                  <option>9</option>
                                  <option>10</option>
                          </select>    
                    </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Gatos</label>
                          <select class="form-control" type="text" id="gatos" required>
                                  <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>5</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                  <option>8</option>
                                  <option>9</option>
                                  <option>10</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Otras Mascotas</label>
                          <select class="form-control" type="text" id="otras_mascotas" required>
                                  <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>5</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                  <option>8</option>
                                  <option>9</option>
                                  <option>10</option>
                          </select>
                      </div>
                    </div>
                      
                    </div>
                
                      </div> 
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                                <div class="form-group">
                                   <label>Observaciones de Vivienda</label>
                                   <textarea class="form-control" rows="6" id="observaciones" type="text"><?php echo $observaciones;?></textarea>
                                </div>

                    </div>
                        </div>
                      </div>                                      
                        <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12 text-center" >
                                 <button type="submit" title="Siguiente" class="btn btn-success btn-sm" >Siguiente&nbsp;<i class="fa fa-chevron-right"></i></button>
                              </div>
                              
                            </div>  
        </div> 
          </form>   
      </div>
      </div>
       <br>
                            <br>
                            <br>
 </div>
</div>

<script type="text/javascript">
  /*ocultas el div con el id alerta*/
  $("#alerta").hide(); 
  </script>
