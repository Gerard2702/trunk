<script src="librerias/js/cargarFormularios.js"></script>
<script src="librerias/js/funcionesFrmgenerales.js"></script>
<script type="text/javascript" src="../js/funcionesDatepicker.js"></script>
<script type="text/javascript">
  /*ocultas el div con el id alerta*/
  $("#alerta").hide(); 
  $("#area").value("urbana");
  </script>

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
     <h3>INGRESO DE DATOS</h3>
     <hr>
      <div class="panel panel-primary">
        <div class="panel-heading">
          Datos Generales
      </div>
      <div class="panel-body">
          <!-- INICIO DEL CUERPO DEL FORMULARIO-->

          <div class="container-fluid">
                              <div class="row">
                              <div class="col-md-offset-8" >
                              <label>Fecha de Censado</label>

                               </div>
                          <br>  
          </div> 


           <div class="container-fluid">
                              <div class="row">
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
                                            <select type="text" class="form-control" id="colonia" onchange="verificarArea();">
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
                                            <div id="alerta">
                                               <p class="text-danger conten-alert"></p>
                                            </div>
                         </div>
                         </div>

                          
                          
                            </div>                          
                        </div>


                        <div class="container-fluid">
                              <div class="row">
                                <div class="col-md-2">
                                  <div class="form-group">
                                            <label>Area</label>
                                            <input class="form-control" id="area" value=""type="text" placeholder="Area" disabled>
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
                                            <input class="form-control" id="numvi" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" type="text" placeholder="Escriba el Numero">
                                </div>
                               </div>
                          
                          
                            </div>                          
                        </div>
            

              <div class="container-fluid">
                              <div class="row">
                                   <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Cantidad de Familias</label>
                                      <input class="form-control" id="numfa" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" type="text" placeholder="Escriba el Numero">
                                </div>
                               </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                           <label>Religion</label>
                                            <select class="form-control">
                                                <option>Catolicos</option>
                                                <option>Evangelicos</option>
                                                <option>Testigos de Jehova</option>
                                                <option>Adventistas</option>
                                                <option>Mormonesx   </option>
                                            </select>
                                </div>
                               </div>
                               <div class="col-md-3">
                                  <div class="form-group">
                                           <label>Tipo de Familia</label>
                                            <select class="form-control">
                                                <option>Nuclear</option>
                                                <option>Extensa</option>
                                                <option>Extendia</option>
                                            </select>
                                </div>
                               </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                           <label>Seguridad</label>
                                            <select class="form-control">
                                             
                                             </select>
                                </div>
                               </div>
                               </div>
                          
                          </div>  

                 <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-3">  
                        <div class="form-group has-feedback">
                              <label>Vectores y Mascotas</label>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Zancudos
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Moscas
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Moscas
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Chinches Picudas
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Cucarachas
                                                </label>
                                            </div>
                                          </div>
                    </div>

                    <div class="col-md-3">
                    <div class="form-group">

                          <label>Perros</label>
                          <select class="form-control">
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
                          <label>Gatos</label>
                          <select class="form-control">
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
                          <label>Otras Mascotas</label>
                          <select class="form-control">
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
                    <div class="col-md-6">
                                <div class="form-group">
                                   <label>Observaciones</label>
                                   <textarea class="form-control" rows="6"></textarea>
                                </div>

                    </div>  
                    </div>
                 
                          <br>
                          <br>
                          <br>
                            </div>                                       
                        </div>
      </div>
       <div class="container-fluid">
                            <div class="row">
                              <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12 text-center" >
                                 
                                 <button type="button" title="Siguiente" class="btn btn-success btn-sm disabled" onclick="cargarGenerales();">1</button>
                                 <button type="button" title="Siguiente" class="btn btn-success btn-sm " onclick="cargarConstruccion();">2</button>
                                 <button type="button" title="Siguiente" class="btn btn-success btn-sm " onclick="cargarFamilia();">3</button>
                                 
                                 <button type="button" title="Siguiente" class="btn btn-success btn-sm" onclick="cargarConstruccion();"><i class="fa fa-chevron-right"></i></button>
                              </div>
                              
                            </div>  
                            </div>
                            <br>
                            <br>
                            <br>
  </div>
 </div>
</div>

<script type="text/javascript">
  /*ocultas el div con el id alerta*/
  $("#alerta").hide(); 
  $("#area").value("urbana");
  </script>
