<script type="text/javascript" src="librerias/js/cargarFormularios.js"></script>
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
?>
<script>
     $("#fecha_nacimiento").datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: '1900:2020',
    dateFormat: 'yy-mm-dd'
  });
    </script>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
      <h3 class="col-md-5 col-sm-6 col-xs-6">INGRESO DE DATOS DE LA PERSONA</h3>  
    </div>
<form class="form-signin"  id="datos-personales">
      
         
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
                    <input class="form-control datepicker" type="text" id="fecha_nacimiento"  placeholder="Ingrese un Fecha" >
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
                          <input type="text" class="form-control" placeholder="numfamilia" id="numfamilia"  value="1" required disabled="" />
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
         
    

        
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="cargarFamilia();">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
      </div>
      </div>