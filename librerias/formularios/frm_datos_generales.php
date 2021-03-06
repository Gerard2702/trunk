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
    $area = "Area";
    $nom_colonia= "Seleccione una Colonia";
    $pasaje ="";
    $tenencia="Seleccione una Tenencia";
    $num_vivienda="";
    $can_familias="";
    $religion ="Seleccione una Religion";
    $tipo_familia="Seleccione una Familia";
    $seguridad ="Seleccione una Seguridad";
    $perros=0;
    $gatos=0;
    $otros=0;
    $observaciones ="";
    $vectores=array();
 
    /* inicializamos variables del formulario 1 que están en la sesión, por ejemplo, si volví del formulario 2 al 1 */
    if (!empty($_SESSION['fecha_censado'])){
    $fecha_censo = $_SESSION['fecha_censado'];
    $area = $_SESSION['Area'];
    $nom_colonia = $_SESSION['colonia'];
    $pasaje = $_SESSION['pasaje'];
    $num_vivienda = $_SESSION['num_vivienda'];
    $can_familias = $_SESSION['can_familia'];
    $religion = $_SESSION['religion'];
    $tipo_familia = $_SESSION['tipo_familia'];
    $seguridad = $_SESSION['seguridad'];
    $tenencia = $_SESSION['tenencia'];
    $perros = $_SESSION['perros'];
    $gatos = $_SESSION['gatos'];
    $otros = $_SESSION['otras_mascotas'];
    $observaciones = $_SESSION['observaciones'];
    };

    if (isset($_SESSION['vectores'])){
         $vectores=$_SESSION['vectores'];
      }
?>

<!--INICIO DEL CUERPO DEL FORMULARIO -->

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
      <img class="img-responsive" alt="Responsive image" src="librerias/imagenes/step1new.png" alt="">
    </div>  
    </div>
    <div class="row">
      <h3 class="col-md-5 col-sm-6 col-xs-6">INGRESO DE DATOS<small>&nbsp;&nbsp;Paso 1</small></h3>
      <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-4 text-right">
        <input class="btn btn-danger btn-sm" type="button" onclick="reiniciarFormulario();" value="LIMPIAR FORMULARIO">
      </div>
      
    </div>
     
      <div class="panel panel-primary">
        <div class="panel-heading">
          Datos Generales
        </div>
        <div class="panel-body">
          <!-- INICIO DEL CUERPO DEL FORMULARIO-->
          <form class="form-signin"  id="ingresar-generales" method="post">
            
          <div class="container-fluid">
            <div class="row">
            <div class="col-md-3" >
            <div class="form-group">
            <label>Fecha de Censado (2)</label>

             <input class="form-control datepicker"  type="text" id="fecha_censado" value="<?php echo $fecha_censo ?>" placeholder="Ingrese un Fecha"required>
             </div>
            </div>
                       
          </div> 
          </div>
           <div class="container-fluid">
              <div class="row">
               <div class="col-md-3">
                    <div class="form-group">
                        <label>Departamento</label>
                        <select class="form-control" autofocus="" id="departamento" disabled="deshabilitado" required>
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
                    <label>Colonia/Residencial (4)</label>
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
                    <input class="form-control" id="numvivienda"  title="Escriba un numero" type="text" placeholder="Escriba el Numero" value="<?php echo $num_vivienda;?>" required>
                </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>Area</label>
                    <input class="form-control" id="area" value="<?php echo $area ?>" type="text" placeholder="Area" disabled required>
                  </div>
                </div>
            </div>                          
          </div>
            
        <hr>
          <div class="container-fluid">
            <div class="row">
            
              <div class="col-md-3">
                 <div class="form-group">
                  <label>Tipo de Familia (7)</label>
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
                  <input class="form-control" id="can_familia" pattern="[0-9]{1,10}" type="text" placeholder="Escriba el Numero" value="1" required disabled="">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Religion (6)</label>
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
                    <label>Tenencia (8)</label>
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
                  <label>Seguridad (Item 51)</label>
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
                              <label>Vectores</label>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vectores[]" value="1" <?php if(in_array('1',$vectores)){ echo 'checked="checked"';}?>>Zancudos (22)
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vectores[]" value="2" <?php if(in_array('2',$vectores)){ echo 'checked="checked"';}?>>Moscas (23)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vectores[]" value="3" <?php if(in_array('3',$vectores)){ echo 'checked="checked"';}?>>Chinches Picudas (24)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vectores[]" value="4" <?php if(in_array('4',$vectores)){ echo 'checked="checked"';}?>>Cucarachas (25)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vectores[]" value="5" <?php if(in_array('5',$vectores)){ echo 'checked="checked"';}?>>Roedores (26)
                                                </label>
                                            </div>
                                          </div>
                    </div>

                    <div class="col-md-3">
                    <div class="form-group">

                          <label>Perros (27)</label>
                          <select class="form-control" type="text" id="perros" required><?php if($perros!=0) { ?>
                                  <option value="<?php echo $perros ?>"><?php echo $perros ?></option> <?php }?>
                                  <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
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
                        <label>Gatos (28)</label>
                          <select class="form-control" type="text" id="gatos" required><?php if($gatos!=0) { ?>
                                  <option value="<?php echo $gatos ?>"><?php echo $gatos ?></option> <?php }?>
                                  <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
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
                        <label>Otras Mascotas (29)</label>
                          <select class="form-control" type="text" id="otras_mascotas" required><?php if($otros!=0) { ?>
                                  <option value="<?php echo $otros ?>"><?php echo $otros ?></option> <?php }?>
                                  <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
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
                      <hr>                                     
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
 </div>
</div>
<script type="text/javascript">
  /*ocultas el div con el id alerta*/
  $("#alerta").hide(); 
  </script>
    <script>

     $( "#fecha_censado" ).datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: '2010:2020',
    dateFormat: 'yy-mm-dd',
    maxDate: "0D"
  });
    </script>