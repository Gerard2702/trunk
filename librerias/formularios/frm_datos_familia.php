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

  mysql_query("CREATE TABLE IF NOT EXISTS `$usuario` (
  `id_$usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `fecha_nac` DATE NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  `id_nacionalidad` INT(11) NOT NULL,
  `id_niveleducativo` INT(11) NOT NULL,
  `id_discapacidad` INT(11) NOT NULL,
  `id_causadisca` INT(11) NOT NULL,
  `id_ocupacion` INT(11) NOT NULL,
  `id_parentesco` INT(11) NOT NULL,
  `id_sitlaboral` INT(11) NOT NULL,
  `id_enfermedad` INT(11) NOT NULL,
  `id_vivienda` INT(11) NULL DEFAULT NULL,
  `id_ingreso` INT(11) NOT NULL,
  `num_familia` INT(11) NOT NULL,
  PRIMARY KEY (`id_$usuario`),
  INDEX `fk_persona_Nacionalidad1_idx$usuario` (`id_nacionalidad`),
  INDEX `fk_persona_nivel_educativo1_idx$usuario` (`id_niveleducativo`),
  INDEX `fk_persona_tipo_discapacidad1_idx$usuario` (`id_discapacidad`),
  INDEX `fk_persona_ocupacion1_idx$usuario` (`id_ocupacion`),
  INDEX `fk_persona_parentesco1_idx$usuario` (`id_parentesco`),
  INDEX `fk_persona_situacion_laboral1_idx$usuario` (`id_sitlaboral`),
  INDEX `fk_persona_enfermedad1_idx$usuario` (`id_enfermedad`),
  INDEX `fk_persona_vivienda1_idx$usuario` (`id_vivienda`),
  INDEX `fk_persona_ingreso_economico1_idx$usuario` (`id_ingreso`),
  INDEX `fk_persona_causa_discapacidad1$usuario` (`id_causadisca`),
  CONSTRAINT `fk_persona_Nacionalidad1$usuario` FOREIGN KEY (`id_nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_causa_discapacidad1$usuario` FOREIGN KEY (`id_causadisca`) REFERENCES `causa_disca` (`id_causa`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_enfermedad1$usuario` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedad` (`id_enfermedad`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_ingreso_economico1$usuario` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso_economico` (`id_ingreso`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_nivel_educativo1$usuario` FOREIGN KEY (`id_niveleducativo`) REFERENCES `nivel_educativo` (`id_niveleducativo`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_ocupacion1$usuario` FOREIGN KEY (`id_ocupacion`) REFERENCES `ocupacion` (`id_ocupacion`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_parentesco1$usuario` FOREIGN KEY (`id_parentesco`) REFERENCES `parentesco` (`id_parentesco`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_situacion_laboral1$usuario` FOREIGN KEY (`id_sitlaboral`) REFERENCES `situacion_laboral` (`id_sitlaboral`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_tipo_discapacidad1$usuario` FOREIGN KEY (`id_discapacidad`) REFERENCES `discapacidad` (`id_disca`) ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT `fk_persona_vivienda1$usuario` FOREIGN KEY (`id_vivienda`) REFERENCES `vivienda` (`id_vivienda`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;");

    

    $sqlpersonastemporal = "SELECT $usuario.id_$usuario as id_persona,$usuario.nombre as nombre_personas,$usuario.apellido,$usuario.fecha_nac,ocupacion.nombre as ocupacion FROM $usuario  inner join ocupacion on $usuario.id_ocupacion=ocupacion.id_ocupacion;";
    $rspersonastemporal = mysql_query($sqlpersonastemporal);
    $numpersonastemporal = mysql_num_rows($rspersonastemporal);


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
         $patrimonioFamiliar=$_SESSION['patrimonioFamiliar'];
      }

    
    ?>
<script>
     $("#fecha_nacimiento").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: '1900:2020',
    dateFormat: 'dd/mm/yy'
  });
     $('#exampleModal').modal('hide'); 
    </script>

    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
      <img class="img-responsive" alt="Responsive image" src="librerias/imagenes/step3new.png" alt="">
    </div>  
    </div>
    <div class="row">
      <h3 class="col-md-5 col-sm-6 col-xs-6">INGRESO DE DATOS<small>&nbsp;&nbsp;Paso 3</small></h3>
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
                    <?php if($numpersonastemporal>0){ ?>
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha nacimiento</th>
                                    
                                    <th>Ocupación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php   

                                         while($modulo = mysql_fetch_array($rspersonastemporal,MYSQL_ASSOC)){
                                          

                                    ?>
                                <tr>
                                    <td><?php echo $modulo['nombre_personas'];?></td>
                                    <td><?php echo $modulo['apellido'];?></td>
                                    <td><?php echo $modulo['fecha_nac'];?></td>
                                    <td><?php echo $modulo['ocupacion'];?></td>
                                    
                                    <td><button type="button" title="Editar" class="btn btn-primary btn-sm" onclick="editarPersona('<?php echo $modulo['id_persona'];?>')"><i class="glyphicon glyphicon-cog"></i>&nbsp;Editar</button>&nbsp;<button type="button" title="Finalizar" class="btn btn-danger btn-sm" onclick="eliminarPersona('<?php echo $modulo['id_persona'];?>')"><i class="glyphicon glyphicon-remove"></i>&nbsp;Eliminar</button></td>

                                </tr>   
                                    <?php  }//fin del mientras que recorre resultados

                                ?>
                                <?php }//fin del if que verifica resultados de consulta
                          else{ ?>                          
                              <thead>
                                <tr>
                                <div class="alert alert-danger" role="alert"><strong>¡No se han Agregado Personas!</strong>&nbsp;Agregue al menos una persona para finalizar el Censo.</div>
                                </tr> 
                            </thead>                          

                    <?php      }
                    ?>
                            </tbody>
                    </table>
                    
                    
                </div> 
                <button type="button" class="btn btn-primary btn-sm" onclick="cargarFrmPersonas();"><span class="glyphicon glyphicon-plus"></span> Agregar Persona</button>
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
                                                    <input type="checkbox" name="ingresos[]" value="2" <?php if(in_array('2',$ingresosEconomicos)){ echo 'checked="checked"';}?>>Bonos (35)
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
                                                    <input type="checkbox" name="patrimonio[]" value="1" <?php if(in_array('1',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Cultivo Agricola Propio (30)
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="2" <?php if(in_array('2',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Aves de Corral (31)
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="3" <?php if(in_array('3',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Ganado Vacuno (32)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="4" <?php if(in_array('4',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Ganado Porcino (33)
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="5" <?php if(in_array('5',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Negocio Propio (34)
                                                </label>
                                            </div>
                                             <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="patrimonio[]" value="6" <?php if(in_array('6',$patrimonioFamiliar)){ echo 'checked="checked"';}?>>Otros
                                                </label>
                                            </div>

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
                                 <button type="button" title="Atras"  class="btn btn-success btn-sm" onclick="cargarConstrucciondatos();"><i class="fa fa-chevron-left"></i>&nbsp;Anterior&nbsp;</button>
                                 <?php if($numpersonastemporal>0){ ?>
                                 <button type="button" title="Finalizar" class="btn btn-primary btn-sm" onclick="finalizarCenso();">Finalizar&nbsp;<i class="glyphicon glyphicon-floppy-save"></i></button>
                                 <?php } else {?>
                                 <button type="button" title="Finalizar" class="btn btn-primary btn-sm" disabled="">Finalizar&nbsp;<i class="glyphicon glyphicon-floppy-save"></i></button>
                                 <?php }?>
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
                                            <label>Parentesco con Jefe de Familia (42) <span class="fa fa-users" aria-hidden="true"></span></label>
                                            
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
                    <label>Nivel Educativo (44)<span class="glyphicon glyphicon-education" aria-hidden="true"></span></label>
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
                    <label class="control-label">Ocupacion (50) <span class="fa fa-briefcase" aria-hidden="true"></span></label>
                        
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
                    <label class="control-label">Situacion Laboral (45)<span class="fa fa-briefcase" aria-hidden="true"></span></label>
                             
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
                    <label class="control-label">Ingresos Economicos (46)<span class="fa fa-usd" aria-hidden="true"></span></label>
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
                    <label>Discapacidad (47)<span class="glyphicon glyphicon-alert" aria-hidden="true"></span></label>
                                       
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
                                           <label>Causa de la Discapacidad (48)<span class="glyphicon glyphicon-alert" aria-hidden="true"></span>   </label>
                    
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
                              <label>Enfermedad Cronica (49)<span class="glyphicon glyphicon-alert" aria-hidden="true"></span></label>
                         
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