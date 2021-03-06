<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="estilos.css">

</head>

<body>

<div class="container">
		<div class="main row">
		
		<div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Datos Generales
                        </div>
                        <div class="panel-body">
                        <form class="form-signin"  id="ingresar-no-censada">
                        <div class="container-fluid">
                            <div class="row">
                            <div class="col-md-offset-8 col-md-4" >
                        <div class="form-group">
                              
                              <label>Fecha de Censado</label>
                               <input class="form-control" type="date" id="fecha-censado" required>
                              </div>
                            </div> 
                      </div>
                        </div>
                            
                          <div class="col-md-4">
                            <div class="form-group">
                                            <label>Departamento</label>
                                            <select class="form-control" id="departamento" disabled="deshabilitado">
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
                                            <select class="form-control" id="municipio" disabled="deshabilitado">
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

                        
                        <div class="container">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Area</label>
                                            <input class="form-control" id="area" type="text" placeholder="Urbana" disabled>
                                        </div>
                                     </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pasaje/Poligono/Senda/Etc.</label>
                                            <input class="form-control" type="text" placeholder="Escriba su direccion aqui" required>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Numero de Vivienda</label>
                                            <input class="form-control" id="numerocasa" type="text" placeholder="Escriba el Numero" required>
                                        </div>
                                     </div>
                        </div>                          
                        </div>
                        

                        <div class="container">
                                <div class="row">

                                         <div class="col-md-2">
                                         <div class="form-group">
                                            <label>Razon No Censo</label>
                                         <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Vivienda Renuente
                                                </label>
                                         </div>
                                         <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Vivienda Cerrada
                                                </label>
                                         </div>
                                         <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Deshabitada
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

                        
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                        


                     </div>



                          </div>
                          <br>
                     <br>
                     <br>
                        </div>
                   </div>	
        		</div>
	
<script src="./bootstrap/js/jquery.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>

</body>

</html>