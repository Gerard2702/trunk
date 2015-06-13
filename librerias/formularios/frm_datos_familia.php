<script type="text/javascript" src="librerias/js/cargarFormularios.js"></script>
<script type="text/javascript" src="../js/funcionesDatepicker.js"></script>

<div class="container">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
     <h3>INGRESO DE DATOS</h3>
    <hr>  
        <!-- Tab panes -->
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
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Nivel Academico</th>
                                    <th>Ocupación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0998877</td>
                                    <td>Manolo</td>
                                    <td>Aguirre</td>
                                    <td>Universitario</td>
                                    <td>Profesor de Computacion</td>
                                    <td>
                                        <a href=""><span class="glyphicon glyphicon-edit"></span> Ver y Editar</a>
                                        <a href=""><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>0998877</td>
                                    <td>Manolo</td>
                                    <td>Aguirre</td>
                                    <td>Universitario</td>
                                    <td>Profesor de Computacion</td>
                                    <td>
                                        <a href=""><span class="glyphicon glyphicon-edit"></span> Ver y Editar</a>
                                        <a href=""><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>0998877</td>
                                    <td>Manolo</td>
                                    <td>Aguirre</td>
                                    <td>Universitario</td>
                                    <td>Profesor de Computacion</td>
                                    <td>
                                        <a href=""><span class="glyphicon glyphicon-edit"></span> Ver y Editar</a>
                                        <a href=""><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>0998877</td>
                                    <td>Manolo</td>
                                    <td>Aguirre</td>
                                    <td>Universitario</td>
                                    <td>Profesor de Computacion</td>
                                    <td>
                                        <a href=""><span class="glyphicon glyphicon-edit"></span> Ver y Editar</a>
                                        <a href=""><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                                    </td>
                                </tr>
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
                                                    <input type="checkbox" value="">Salarios
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Remesas Extranjero
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Pensiones
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Negocio Propio
                                                </label>
                                            </div>
                                             <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Otros
                                                </label>
                                            </div>

                                         </div>
                        </div>
                        <div class="col-md-2">
                                <div class="form-group">
                                            <label>Patrimonio Familiar</label>
                                            
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Cultivo Agricola Propio
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Aves de Corral
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Ganado Vacuno
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Negocio Propio
                                                </label>
                                            </div>
                                             <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Bono
                                                </label>
                                            </div>

                                         </div>
                            
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                            <label>Observaciones</label>
                                            <textarea class="form-control" rows="6"></textarea>
                                         
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
                                 <button type="button" title="Atras"  class="btn btn-success btn-sm" onclick="cargarConstruccion();"><i class="fa fa-chevron-left"></i></button>
                                 <button type="button" title="Siguiente" class="btn btn-success btn-sm " onclick="cargarGenerales();">1</button>
                                 <button type="button" title="Siguiente" class="btn btn-success btn-sm " onclick="cargarConstruccion();">2</button>
                                 <button type="button" title="Siguiente" class="btn btn-success btn-sm disabled" onclick="cargarFamilia();">3</button>
                                 
                                 <br>
                                 <br>
                                 <br>
                                 <br>
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
      <div class="modal-body">
         
         <!--Panel Datos Personales-->

            <div class="panel panel-primary">
              <div class="panel-heading">
                 <h3 class="panel-title">Datos Personales</h3>
              </div>
              <div class="panel-body">
                   <div class="row">
            <div class="col-md-4">
            <form role="form"> 
                  <div class="form-group has-feedback">
                    <label class="control-label">Nombres <span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
                    <input type="text" class="form-control" placeholder="Nombres" />
                    
                  </div>
            </form>
            </div>
                <div class="col-md-4">
            <form role="form"> 
                  <div class="form-group has-feedback">
                    <label class="control-label">Apellidos <span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
                    <input type="text" class="form-control" placeholder="Apellidos" />
                  </div>
            </form>
            </div>
            <div class="col-md-4">
                <form role="form"> 
                  <div class="form-group has-feedback">
                    <label class="control-label">Fecha de Nacimiento <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label>
                    <input type="text" class="form-control" id="fecha-nacimiento" pattern="(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d" placeholder="Fecha de Nacimiento" required/>
                
                  </div>
                </form>
            </div>
           </div>
              
            <div class="row">
            
                        <div class="col-md-3 ">
                            <div class="form-group has-feedback">
                                            <label>Genero <span class="glyphicon glyphicon-user" aria-hidden="true"></span></label>
                                            <select class="form-control">
                                                <option>Femenino</option>
                                                <option>Masculino</option>
                                            </select>
                            </div>
                        </div>
                       
                        <div class="col-md-3">
                        <div class="form-group">
                                            <label>Nacionalidad <span class="glyphicon glyphicon-flag" aria-hidden="true"></span></label>
                                            <select class="form-control">
                                                <option>Salvadoreño</option>
                                                <option>Hondureño</option>
                                            </select>
                         </div>
                        </div>
                       
                        <div class="col-md-6">
                          <div class="form-group">
                                            <label>Parentesco con Jefe de Familia <span class="fa fa-users" aria-hidden="true"></span></label>
                                            <select class="form-control">
                                                <option>Jefe de Familia</option>
                                                <option>Sobrino/a</option>
                                            </select>
                         </div>
                            </div>
           
          </div>
         </div> 
         </div>

            <!--Panel Nivel Educativo y Ocupacion-->

             <div class="panel panel-primary">
              <div class="panel-heading">
                 <h3 class="panel-title">Nivel Educativo, Ocupacion e Ingresos Economicos</h3>
              </div>
              <div class="panel-body">
                   <div class="row">
            <div class="col-md-4">
            <form role="form"> 
                  <div class="form-group has-feedback">
                    <label>Nivel Educativo <span class="glyphicon glyphicon-education" aria-hidden="true"></span></label>
                                            <select class="form-control">
                                                <option>Parvularia</option>
                                                <option>Basica</option>
                                            </select>
                   </div>
            </form>
            </div>
                <div class="col-md-4">
            <form role="form"> 
                  <div class="form-group has-feedback">
                    <label class="control-label">Ocupacion <span class="fa fa-briefcase" aria-hidden="true"></span></label>
                         <select class="form-control">
                                                <option>Albañil</option>
                                                <option>Panadero</option>
                                            </select>
                  </div>
            </form>
            </div>
            <div class="col-md-4">
                <form role="form"> 
                  <div class="form-group has-feedback">
                    <label class="control-label">Ingresos Economicos <span class="fa fa-usd" aria-hidden="true"></span></label>
                             <select class="form-control">
                                                <option>Trabajo Remunerado</option>
                                                <option>Pension</option>
                                            </select>
                  </div>
                </form>
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
            <form role="form"> 
                  <div class="form-group">
                                            <label>Tipo de Discapacidad <span class="glyphicon glyphicon-alert" aria-hidden="true"></span></label>
                                       
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="discapacidad" id="optionsRadios1" value="option1" checked>Fisica y Motriz
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="discapacidad" id="optionsRadios1" value="option1">Intelectual
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="discapacidad" id="optionsRadios2" value="option2">Mixtas
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="discapacidad" id="optionsRadios2" value="option2">Otras
                                                </label>
                                            </div>
                                         
                                                                                
                  </div>
            </form>
            </div>
                <div class="col-md-4">
            <form role="form"> 
                  <div class="form-group has-feedback">
                                           <label>Causa de la Discapacidad <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>   </label>
                                       
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="causadiscapacidad" id="optionsRadios1" value="option1" checked>Accidente de Trabajo
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="causadiscapacidad" id="optionsRadios1" value="option1">Secuelas de la Guerra
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="causadiscapacidad" id="optionsRadios2" value="option2">Mixtas
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="causadiscapacidad" id="optionsRadios2" value="option2">Otras
                                                </label>
                                            </div>
                  </div>
            </form>
            </div>
            <div class="col-md-4">
                <form role="form"> 
                  <div class="form-group has-feedback">
                              <label>Enfermedad Cronica <span class="glyphicon glyphicon-alert" aria-hidden="true"></span></label>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Diabetes
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Algun Tipo de Cancer
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Hipertension
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Mas de una
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">otra
                                                </label>
                                            </div>
                                             <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Ninguna
                                                </label>
                                            </div>
                  </div>
                </form>
            </div>
           </div>
              </div>
            
         </div> 


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>

      </div>
    </div>
  </div>
</div>
  </div>
 </div>
</div>


