<script type="text/javascript" src="librerias/js/cargarFormularios.js"></script>
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
    $query = "SELECT nombre from nacionalidad order by nombre;";
    $rsnacionalidad = mysql_query($query);
    $numnacionalidad = mysql_num_rows($rsnacionalidad);

    $sqlparentesco = "SELECT nombre from parentesco order by nombre;";
    $rsparentesco= mysql_query($sqlparentesco);
    $numparentesco = mysql_num_rows($rsparentesco);

    $sqlniveleducativo = "SELECT nombre from nivel_educativo";
    $rsniveleducativo = mysql_query($sqlniveleducativo);
    $numniveleducativo = mysql_num_rows($rsniveleducativo);

    $sqlocupacion = "SELECT nombre from ocupacion order by nombre;";
    $rsocupacion = mysql_query($sqlocupacion);
    $numocupacion = mysql_num_rows($rsocupacion);

    $sqlsitlaboral = "SELECT nombre from situacion_laboral order by nombre;";
    $rssitlaboral = mysql_query($sqlsitlaboral);
    $numsitlaboral = mysql_num_rows($rssitlaboral);

    $sqlingreso = "SELECT nombre from ingreso_economico order by nombre;";
    $rsingreso = mysql_query($sqlingreso);
    $numingreso = mysql_num_rows($rsingreso);

    $sqldiscapacidad = "SELECT nombre from discapacidad order by nombre;";
    $rsdiscapacidad = mysql_query($sqldiscapacidad);
    $numdiscapacidad = mysql_num_rows($rsdiscapacidad);

    $sqlcausa = "SELECT descripcion from causa_disca order by descripcion;";
    $rscausa = mysql_query($sqlcausa);
    $numcausa = mysql_num_rows($rscausa);

    $sqlenfermedad = "SELECT nombre from enfermedad order by nombre;";
    $rsenfermedad = mysql_query($sqlenfermedad);
    $numenfermedad = mysql_num_rows($rsenfermedad);

    $sqlpersonas = "SELECT nombre from persona order by nombre;";
    $rspersonas = mysql_query($sqlpersonas);
    $numpersonas = mysql_num_rows($rspersonas);

    /*Inicializa las variables en caso que no esten declaradas*/
    $ingresosEconomicos=array();
    $observacionesFamilia="";
    $patrimonioFamiliar=array();
 
    /* inicializamos variables del formulario 1 que están en la sesión, por ejemplo, si volví del formulario 2 al 1 */

    /*SE verifica que las variables de sesion contengan datos en el array en caso de haber seleccioando un checkbox*/
    if (isset($_SESSION['ingresosEconomicos'])){
         $ingresosEconomicos=$_SESSION['ingresosEconomicos'];
      }

    if (isset($_SESSION['patrimonioFamiliar'])){
         $patrimonioFamiliar=$_SESSION['otros'];
      }

    if (isset($_SESSION['observacionesFamilia'])){
         $otros_servicios=$_SESSION['observacionesFamilia'];
      }
    
    ?>
<script>
     $("#fecha_nacimiento").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: '1900:2020',
    dateFormat: 'dd/mm/yy'
  });
    </script>

    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
      <img class="img-responsive" alt="Responsive image" src="librerias/imagenes/step3new.png" alt="">
    </div>  
    </div>
    <div class="row">
      <h3 class="col-md-5 col-sm-6 col-xs-6">INGRESO DE DATOS </h3>
      <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-4 text-right">
        <input class="btn btn-danger btn-sm" type="button" onclick="reiniciarFormulario();" value="LIMPIAR FORMULARIO">
        </div>
      </div>
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="panel panel-primary">
                <div class="panel-heading">
          Datos de Familia
      </div>
                
                <div class="panel-body">
                <div class="panel panel-default">
                <div class="panel-body">
                <h4 ><small>INTEGRANTES DE LA FAMILIA</small></h4>
                
                     <div class="table-responsive ">
                
                    <table class="table table-hover">
                    <?php if($numenfermedad>0){?>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th># Familia</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Nivel Academico</th>
                                    <th>Ocupación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php   

                                        while($modulo = mysql_fetch_array($rsenfermedad, MYSQL_ASSOC)){  
                                    ?>
                                <tr>
                                    <td>VALORES</td>
                                    <td>VALORES</td>
                                    <td>VALORES</td>
                                    <td>VALORES</td>
                                    <td>VALORES</td>
                                    <td>VALORES</td>
                                    <td>VALORES</td>
                                </tr>   
                                    <?php  }//fin del mientras que recorre resultados

                                ?>
                                <?php }//fin del if que verifica resultados de consulta
                          else{ ?>                          
                              <thead>
                                <tr>
                                     <th >NO SE HAN INGRESADO PERSONAS!</th>
                                </tr> 
                            </thead>                          

                    <?php      }
                    ?>
                            </tbody>
                    </table>
                    
                    
                </div> 
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><span class="glyphicon glyphicon-plus"></span> Agregar Persona</button>
                </div>
                  </div>
                        <div class="row">
                        <div class="col-md-2">
                                <div class="form-group">
                                            <label>Ingresos Economicos</label>
                                            
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="ingresos[]" value="1" <?php if(in_array('1',$ingresosEconomicos)){ echo 'checked="checked"';}?>>Remesas Extranjero
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="ingresos[]" value="2" <?php if(in_array('2',$ingresosEconomicos)){ echo 'checked="checked"';}?>>Bonos
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="ingresos[]" value="3" <?php if(in_array('3',$ingresosEconomicos)){ echo 'checked="checked"';}?>>Pensiones
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="ingresos[]" value="4" <?php if(in_array('4',$ingresosEconomicos)){ echo 'checked="checked"';}?>>Salarios
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="ingresos[]" value="5" <?php if(in_array('5',$ingresosEconomicos)){ echo 'checked="checked"';}?>>Negocio Propio
                                                </label>
                                            </div>
                                             <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="ingresos[]" value="6" <?php if(in_array('6',$ingresosEconomicos)){ echo 'checked="checked"';}?>>Otros
                                                </label>
                                            </div>

                                         </div>
                        </div>
                        <div class="col-md-2">
                                <div class="form-group">
                                            <label>Patrimonio Familiar</label>
                                            
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="1" <?php if(in_array('1',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Cultivo Agricola Propio
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="2" <?php if(in_array('2',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Aves de Corral
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="3" <?php if(in_array('3',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Ganado Vacuno
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="4" <?php if(in_array('4',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Ganado Porcino
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="5" <?php if(in_array('5',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Negocio Propio
                                                </label>
                                            </div>
                                             <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="6" <?php if(in_array('6',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Otros
                                                </label>
                                            </div>

                                         </div>
                            
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                            <label>Observaciones</label>
                                            <textarea class="form-control" rows="6"><?php echo $observacionesFamilia;?></textarea>
                                         
                                </div>
                            
                        </div>
                     </div>
                </div>
                </div>
                
                </div>  
        </div>
       <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12 text-center" >
                                 <button type="button" title="Atras"  class="btn btn-success btn-sm" onclick="cargarConstruccion();"><i class="fa fa-chevron-left"></i>&nbsp;Anterior&nbsp;</button>
                        
                                 
                                 <br>
                                 <br>
                                 <br>
                                 <br>
                              </div>
                              
                            </div>  
                            </div>
                            </div>
                            </div>
                        
                             
<div class="container">
        <div class="row">
<div class="modal fade bs-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Ficha Personal</h4>
      </div>
      <form class="form-signin"  id="datos-personales">
      <div class="modal-body">
         
         <!--Panel Datos Personales-->
          
            <div class="panel panel-primary">
              <div class="panel-heading">
                 <h3 class="panel-title">Datos Personales</h3>
              </div>
              <div class="panel-body">
                   <div class="row">
            <div class="col-md-4">
             
                  <div class="form-group has-feedback">
                    <label class="control-label">Nombres <span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
                    <input type="text" class="form-control" id="nombres" required placeholder="Nombres" />
                    
                  </div>
            
            </div>
                <div class="col-md-4">
             
                  <div class="form-group has-feedback">
                    <label class="control-label">Apellidos <span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
                    <input type="text" class="form-control" placeholder="Apellidos" id="apellidos"  required />
                  </div>
            
            </div>
            <div class="col-md-4">
                  <div class="form-group has-feedback">
                    <label class="control-label">Fecha de Nacimiento <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label>
                    <input class="form-control" type="text" id="fecha_nacimiento"  placeholder="Ingrese un Fecha" required>
                  </div> 
            </div>
           </div>
              
            <div class="row">
            
                        <div class="col-md-2 ">
                            <div class="form-group has-feedback">
                                            <label>Genero <span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
                                            <select class="form-control" id="genero" required>
                                                <option>F</option>
                                                <option>M</option>
                                            </select>
                            </div>
                        </div>
                       
                        <div class="col-md-3">
                        <div class="form-group">
                                            <label>Nacionalidad <span class="glyphicon glyphicon-flag" aria-hidden="true"></span></label>
                                            <select type="text" class="form-control" id="nacionalidad" required >
                     <option value="">Seleccione una Nacionalidad</option>
                        <?php 
                            if($numnacionalidad>0){
                               while($filasnacionalidad = mysql_fetch_array($rsnacionalidad)){
                            echo "<option value='".$filasnacionalidad['nombre']."'>".$filasnacionalidad['nombre']."</option>";}
                            }else{
                              echo "<option value='0'>No hay registros</option>";
                            }
                            ?>
                    </select>
                         </div>
                        </div>
                       
                        <div class="col-md-4">
                          <div class="form-group">
                                            <label>Parentesco con Jefe de Familia <span class="fa fa-users" aria-hidden="true"></span></label>
                                            
                                            <select type="text" class="form-control" id="parentesco" required >
                                            <option value="">Seleccione un Parentesco</option>
                                                <?php 
                                                    if($numparentesco>0){
                                                       while($filasparentesco = mysql_fetch_array($rsparentesco)){
                                                    echo "<option value='".$filasparentesco['nombre']."'>".$filasparentesco['nombre']."</option>";}
                                                    }else{
                                                      echo "<option value='0'>No hay registros</option>";
                                                    }
                                                    ?>
                                             </select>
                         </div>
                            </div>
                        <div class="col-md-3">
                         <div class="form-group  ">
                          <label class="control-label">Numero de Familia <span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
                          <input type="text" class="form-control" placeholder="numfamilia" id="numfamilia"  required />
                        </div>
            
                       </div>
           
          </div>
         </div> 
         </div>

            <!--Panel Nivel Educativo y Ocupacion-->

             <div class="panel panel-primary">
              <div class="panel-heading">
                 <h3 class="panel-title">Nivel Educativo, Ocupacion, Situacion Laboral e Ingresos Economicos</h3>
              </div>
              <div class="panel-body">
                   <div class="row">
            <div class="col-md-3">
            
                  <div class="form-group has-feedback">
                    <label>Nivel Educativo <span class="glyphicon glyphicon-education" aria-hidden="true"></span></label>
                      <select type="text" class="form-control" id="niveleducativo" required >
                         <option value="">Seleccione un Nivel</option>
                            <?php 
                              if($numniveleducativo>0){
                                while($filasniveleducativo = mysql_fetch_array($rsniveleducativo)){
                                 echo "<option value='".$filasniveleducativo['nombre']."'>".$filasniveleducativo['nombre']."</option>";}
                               }else{
                              echo "<option value='0'>No hay registros</option>";
                               }
                              ?>
                        </select>                        




                   </div>
            
            </div>
            <div class="col-md-3">
             
                  <div class="form-group has-feedback">
                    <label class="control-label">Ocupacion <span class="fa fa-briefcase" aria-hidden="true"></span></label>
                        
                            <select type="text" class="form-control" id="ocupacion" required >
                              <option value="">Seleccione una Ocupacion</option>
                              <?php 
                              if($numocupacion>0){
                               while($filasocupacion = mysql_fetch_array($rsocupacion)){
                              echo "<option value='".$filasocupacion['nombre']."'>".$filasocupacion['nombre']."</option>";}
                              }else{
                              echo "<option value='0'>No hay registros</option>";
                              }
                              ?>
                    </select>

                  </div>
            
            </div>
            
            <div class="col-md-3">
                 
                  <div class="form-group has-feedback">
                    <label class="control-label">Situacion Laboral <span class="fa fa-briefcase" aria-hidden="true"></span></label>
                             
                    <select type="text" class="form-control" id="sitlaboral" required >
                              <option value="">Seleccione una Ocupacion</option>
                              <?php 
                              if($numocupacion>0){
                               while($filassitlaboral = mysql_fetch_array($rssitlaboral)){
                              echo "<option value='".$filassitlaboral['nombre']."'>".$filassitlaboral['nombre']."</option>";}
                              }else{
                              echo "<option value='0'>No hay registros</option>";
                              }
                              ?>
                    </select>

                  </div>
                
            </div>

            <div class="col-md-3">
                 
                  <div class="form-group has-feedback">
                    <label class="control-label">Ingresos Economicos <span class="fa fa-usd" aria-hidden="true"></span></label>
                    <select type="text" class="form-control" id="ingreso" required >
                              <option value="">Seleccione un tipo de Ingreso</option>
                              <?php 
                              if($numingreso>0){
                               while($filasingreso = mysql_fetch_array($rsingreso)){
                              echo "<option value='".$filasingreso['nombre']."'>".$filasingreso['nombre']."</option>";}
                              }else{
                              echo "<option value='0'>No hay registros</option>";
                              }
                              ?>
                    </select>
                  </div>
                
            </div>

             
               
           </div>
              </div>
            </div> 

         <!-- Padecimientos -->

               <div class="panel panel-primary">
              <div class="panel-heading">
                 <h3 class="panel-title">Padecimientos</h3>
              </div>
              <div class="panel-body">
                   <div class="row">
            <div class="col-md-3">
            
                  <div class="form-group">
                    <label>Discapacidad <span class="glyphicon glyphicon-alert" aria-hidden="true"></span></label>
                                       
                    <select type="text" class="form-control" id="discapacidad" required >
                              <option value="">Seleccione una Discapacidad</option>
                              <?php 
                              if($numdiscapacidad>0){
                               while($filasdiscapacidad = mysql_fetch_array($rsdiscapacidad)){
                              echo "<option value='".$filasdiscapacidad['nombre']."'>".$filasdiscapacidad['nombre']."</option>";}
                              }else{
                              echo "<option value='0'>No hay registros</option>";
                              }
                              ?>
                    </select>
                                         
                                                                                
                  </div>
           
            </div>
                <div class="col-md-4">
            
                  <div class="form-group has-feedback">
                                           <label>Causa de la Discapacidad <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>   </label>
                    
                    <select type="text" class="form-control" id="causa" required >
                    <option value="">Seleccione una Causa</option>
                              <?php 
                              if($numcausa>0){
                               while($filascausa = mysql_fetch_array($rscausa)){
                              echo "<option value='".$filascausa['descripcion']."'>".$filascausa['descripcion']."</option>";}
                              }else{
                              echo "<option value='0'>No hay registros</option>";
                              }
                              ?>
                    </select>

                                           
                  </div>
            
            </div>
            <div class="col-md-4">
                
                  <div class="form-group has-feedback">
                              <label>Enfermedad Cronica <span class="glyphicon glyphicon-alert" aria-hidden="true"></span></label>
                         
                        <select type="text" class="form-control" id="enfermedad" required >
                              <option value="">Seleccione una Enfermedad</option>
                              <?php 
                              if($numenfermedad>0){
                               while($filasenfermedad = mysql_fetch_array($rsenfermedad)){
                              echo "<option value='".$filasenfermedad['nombre']."'>".$filasenfermedad['nombre']."</option>";}
                              }else{
                              echo "<option value='0'>No hay registros</option>";
                              }
                              ?>
                        </select>                      
                  </div>
                
            </div>
           </div>
              </div>
            
         </div> 
         
    </div>

        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>

      </div>
      </form>
    </div>
  </div>
</div>
  </div>
 </div>