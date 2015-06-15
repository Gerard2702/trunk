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

<div class="row">
	 <div class="container">
    	   
		<!-- Tab panes -->
		<div class="tab-content">
  			<div class="tab-pane active">
  				<br/>
  				<br/>
  				
  				<p><h3>Busqueda por Religion</h3></p>
                <p><h4>Denominacion:</h4></p>
                <br>

                <div class="row">
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

                <div class="form-group">
                 
                  <div class="row">
                    <div class="col-md-8">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="catolicos" value="catolicos"> Catolicos
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="evangelicos" value="evangelicos"> Evangelicos
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="testigos de Jehova" value="tesigos de jehova"> Testigos de Jehova
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="adventistas" value="option3"> Adventistas
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="mormones" value="mormones"> Mormones
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="otros" value="otros"> Otros
                        </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="ninguno" value="ninguno"> Ninguno
                        </label>
                    </div>
                    
                </div>   

                <div class="row">
                    <div class="col-md-3">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Consultar">
                    <input type="submit" class="btn btn-primary" value="Generar Reporte">

                    </div>

                    
                </div>


                </div>
               



                <div class="container">
                <div class="row">
                    
                <div class="table-responsive">

                <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Numero</th>
                                    <th>Direccion</th>
                                    <th>Jefe de Familia</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0998877</td>
                                    <td>Manolo</td>
                                    <td>Aguirre</td>
                                    
                                </tr>
                                <tr>
                                    <td>0998877</td>
                                    <td>Manolo</td>
                                    <td>Aguirre</td>
                                    

                                </tr>
                                <tr>
                                    <td>0998877</td>
                                    <td>Manolo</td>
                                    <td>Aguirre</td>
                                
                                </tr>
                                <tr>
                                    <td>0998877</td>
                                    <td>Manolo</td>
                                    <td>Aguirre</td>
                                
                                </tr>
                            </tbody>
                </table>

                </div>
                </div>                    
                </div>


				                 
                 
				</div>
  			
		</div>

</div>

</div>
</div>
<br>
<br>
<br>

<script src="./bootstrap/js/jquery.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>

</body>

</html>