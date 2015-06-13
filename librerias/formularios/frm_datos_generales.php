<script src="librerias/js/cargarFormularios.js"></script>
<script type="text/javascript" src="../js/funcionesDatepicker.js"></script>


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
                                            <input class="form-control" id="numvi" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" type="text" placeholder="Escriba el Numero">
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
                                                <option>Mormonesx   </option>
                                            </select>
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
