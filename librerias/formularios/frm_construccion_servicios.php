<script src="librerias/js/cargarFormularios.js"></script>

<?php  
    session_start(); /* Verificar inicio de sesion*/
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }
    /*se incluye la conexion con la base de datos*/
    include_once("../php/conexion.php");

    /*Sentencias para recuperar los datos para los select*/
    

    /*Inicializa las variables en caso que no esten declaradas*/
    $vulnerabilidad=array();
    $matparedes="";
    $matpiso= "";
    $mattecho ="";
    $tipoletrina="";
    $manbasura="";
    $abastagua="";
    $aguasgris ="";
    $aguasnegras="";
    $otros_servicios=array();
 
    /* inicializamos variables del formulario 1 que están en la sesión, por ejemplo, si volví del formulario 2 al 1 */
    if (!empty($_SESSION['matparedes'])){
    $matparedes=$_SESSION['matparedes'];
    };
     if (!empty($_SESSION['matpiso'])){
    $matpiso= $_SESSION['matpiso'];
    };
    if (!empty($_SESSION['mattecho'])){
    $mattecho =$_SESSION['mattecho'];
    };
    if (!empty($_SESSION['tipoletrina'])){
    $tipoletrina=$_SESSION['tipoletrina'];
    };
    if (!empty($_SESSION['manbasura'])){
    $manbasura=$_SESSION['manbasura'];
    };
    if (!empty($_SESSION['abastagua'])){
    $abastagua=$_SESSION['abastagua'];
    };
    if (!empty($_SESSION['aguasgris'])){
    $aguasgris =$_SESSION['aguasgris'];
    };
    if (!empty($_SESSION['aguasnegras'])){
    $aguasnegras=$_SESSION['aguasnegras'];
    };
    
    /*SE verifica que las variables de sesion contengan datos en el array en caso de haber seleccioando un checkbox*/
    if (isset($_SESSION['vulnerabilidad'])){
         $vulnerabilidad=$_SESSION['vulnerabilidad'];
      }

    if (isset($_SESSION['otros'])){
         $otros_servicios=$_SESSION['otros'];
      }
      
    
?>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
      <img class="img-responsive" alt="Responsive image" src="librerias/imagenes/step2new.png" alt="">
    </div>  
    </div>
    <div class="row">
      <h3 class="col-md-5 col-sm-6 col-xs-6">INGRESO DE DATOS<small>&nbsp;&nbsp;Paso 2</small></h3>
      <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-4 text-right">
        <input class="btn btn-danger btn-sm" type="button" onclick="reiniciarFormulario();" value="LIMPIAR FORMULARIO">
      </div>
      
    </div>
        <div class="main row">
        <div class="col-lg-12">
        <form class="form-signin"  id="ingresar-construccion">
                 <div class="panel panel-primary">
                        <div class="panel-heading">
                          Detalles de construccion y Riesgos
                        </div>
                        <div class="panel-body">
                        
                              <div class="col-md-3">                                      
                              <div class="form-group">
                                            <label>Vulnerabilidad (Item 12 y 13)</label>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vulnerabilidad[]" value="1" <?php if(in_array('1',$vulnerabilidad)){ echo 'checked="checked"';}?>>Ninguno
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vulnerabilidad[]" value="2" <?php if(in_array('2',$vulnerabilidad)){ echo 'checked="checked"';}?>>Deslave (1)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vulnerabilidad[]" value="3" <?php if(in_array('3',$vulnerabilidad)){ echo 'checked="checked"';}?>>Inundaciones (2)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vulnerabilidad[]" value="4" <?php if(in_array('4',$vulnerabilidad)){ echo 'checked="checked"';}?>>Incendio por Cocina de Leña Interna <b>(Item 13)</b>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vulnerabilidad[]" value="5" <?php if(in_array('5',$vulnerabilidad)){ echo 'checked="checked"';}?>>Contaminacion por disposicion no adecuada de desechos solidos, quimicos. (3)
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="vulnerabilidad[]" value="6" <?php if(in_array('6',$vulnerabilidad)){ echo 'checked="checked"';}?>>Otros Riesgos (4)
                                                </label>
                                            </div>
                              </div>
                              </div>

                              <div class="col-md-2">
                              <div class="form-group">
                                            <label>Material de Paredes (10)</label>
                                               <div class="radio">
                                                <label>
                                                    <input type="radio" name="matparedes" id="matparedes" value="1" required <?php if($matparedes==1){ echo 'checked="checked"';}?>>Ladrillo/Bloque (1)
                                                </label>
                                               </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matparedes" id="matparedes" value="2"  <?php if($matparedes==2){ echo 'checked="checked"';}?>>Adobe (2)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matparedes" id="matparedes" value="3"  <?php if($matparedes==3){ echo 'checked="checked"';}?>>Bahareque (3)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matparedes" id="matparedes" value="4"  <?php if($matparedes==4){ echo 'checked="checked"';}?>>Plastico
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matparedes" id="matparedes" value="5"  <?php if($matparedes==5){ echo 'checked="checked"';}?>>Lamina
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matparedes" id="matparedes" value="6"  <?php if($matparedes==6){ echo 'checked="checked"';}?>>Madera
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matparedes" id="matparedes" value="7"  <?php if($matparedes==7){ echo 'checked="checked"';}?>>Tabla Roca
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matparedes" id="matparedes" value="8"  <?php if($matparedes==8){ echo 'checked="checked"';}?>>Otros (4)
                                                </label>
                                            </div>
                              </div>
                              </div> 
                    
                              <div class="col-md-2">
                              <div class="form-group">
                                            <label>Material de Piso (9)</label>
                                               <div class="radio">
                                                <label>
                                                    <input type="radio" name="matpiso" id="matpiso" value="1" required <?php if($matpiso==1){ echo 'checked="checked"';}?>>Ceramica (1)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matpiso" id="matpiso" value="2" <?php if($matpiso==2){ echo 'checked="checked"';}?>>Ladrillo
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matpiso" id="matpiso" value="3" <?php if($matpiso==3){ echo 'checked="checked"';}?>>Tierra (2)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matpiso" id="matpiso" value="4" <?php if($matpiso==4){ echo 'checked="checked"';}?>>Cemento
                                                </label>
                                            </div>
                                            
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matpiso" id="matpiso" value="5" <?php if($matpiso==5){ echo 'checked="checked"';}?>>Madera
                                                </label>
                                            </div>
                                            
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="matpiso" id="matpiso" value="6" <?php if($matpiso==6){ echo 'checked="checked"';}?>>Otros (3)
                                                </label>
                                            </div>
                              </div>
                              </div>

                       
                                <div class="col-md-2">
                                <div class="form-group">
                                            <label>Material del Techo (11)</label>
                                                <div class="radio">
                                                <label>
                                                    <input type="radio" name="mattecho" id="mattecho" value="1" required <?php if($mattecho==1){ echo 'checked="checked"';}?>>Duralita (1)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="mattecho" id="mattecho" value="2" <?php if($mattecho==2){ echo 'checked="checked"';}?>>Lamina (2)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="mattecho" id="mattecho" value="3" <?php if($mattecho==3){ echo 'checked="checked"';}?>>Teja de Barro (3)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="mattecho" id="mattecho" value="4" <?php if($mattecho==4){ echo 'checked="checked"';}?>>Cemento
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="mattecho" id="mattecho" value="5" <?php if($mattecho==5){ echo 'checked="checked"';}?>>Plastico
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="mattecho" id="mattecho" value="6" <?php if($mattecho==6){ echo 'checked="checked"';}?>>Otros (4)
                                                </label>
                                            </div>
                                </div>
                                </div>
                           

                                <div class="col-md-3">
                                <div class="form-group">
                                                <label>Tipo de Letrina (18)</label>
                                                   <div class="radio">
                                                    <label>
                                                        <input type="radio" name="tipoletrina" id="tipoletrina" value="1" required <?php if($tipoletrina==1){ echo 'checked="checked"';}?>>De Lavar Conectado a fosa Septica (2)
                                                    </label>
                                                   </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="tipoletrina" id="tipoletrina" value="2" <?php if($tipoletrina==2){ echo 'checked="checked"';}?>>De Lavar Conectado a Alcantarillado (1)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="tipoletrina" id="tipoletrina" value="3" <?php if($tipoletrina==3){ echo 'checked="checked"';}?>>Letrina de Hoyo Seco (3)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="tipoletrina" id="tipoletrina" value="4" <?php if($tipoletrina==4){ echo 'checked="checked"';}?>>Letrina Abonera (4)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="tipoletrina" id="tipoletrina" value="5" <?php if($tipoletrina==5){ echo 'checked="checked"';}?>>Otro Tipo (5)
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="tipoletrina" id="tipoletrina" value="6" <?php if($tipoletrina==6){ echo 'checked="checked"';}?>>No Aplica 
                                                    </label>
                                                </div>
                                              </div>                       
                                              </div>
                          </div>
                        
                        </div>
        <div class="main row">
        
        <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Servicios Basicos
                        </div>
                        <div class="panel-body">
                        
                          <div class="col-md-3">
                            
                               <div class="form-group">
                                            <label>Manejo de Basura (21)</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="manbasura" id="manbasura" value="1" required <?php if($manbasura==1){ echo 'checked="checked"';}?>>Servicio Municipal (1)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="manbasura" id="manbasura" value="2" <?php if($manbasura==2){ echo 'checked="checked"';}?>>Cielo Abierto (2)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="manbasura" id="manbasura" value="3" <?php if($manbasura==3){ echo 'checked="checked"';}?>>Se Entierra (3)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="manbasura" id="manbasura" value="4" <?php if($manbasura==4){ echo 'checked="checked"';}?>>Se Quema (4)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="manbasura" id="manbasura" value="5" <?php if($manbasura==5){ echo 'checked="checked"';}?>>Se Tira al Rio/Quebrada (5)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="manbasura" id="manbasura" value="6" <?php if($manbasura==6){ echo 'checked="checked"';}?>>Servicio Particular (6)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="manbasura" id="manbasura" value="7" <?php if($manbasura==7){ echo 'checked="checked"';}?>>Otra Manera (7)
                                                </label>
                                            </div>
                               </div>

                         </div>

                         <div class="col-md-2">
                               <div class="form-group">
                                            <label>Abastecimiento de Agua (16)</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="abastagua" id="abastagua" value="1" required <?php if($abastagua==1){ echo 'checked="checked"';}?>>Cañeria Intradomiciliar (1)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="abastagua" id="abastagua" value="2" <?php if($abastagua==2){ echo 'checked="checked"';}?>>Agua LLuvia (6)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="abastagua" id="abastagua" value="3" <?php if($abastagua==3){ echo 'checked="checked"';}?>>Cantarera (2)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="abastagua" id="abastagua" value="4" <?php if($abastagua==4){ echo 'checked="checked"';}?>>Pipa (5)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="abastagua" id="abastagua" value="5" <?php if($abastagua==5){ echo 'checked="checked"';}?>>Rio (4)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="abastagua" id="abastagua" value="6" <?php if($abastagua==6){ echo 'checked="checked"';}?>>Pozo (3)
                                                </label>
                                                <div class="radio">
                                                <label>
                                                    <input type="radio" name="abastagua" id="abastagua" value="7" <?php if($abastagua==7){ echo 'checked="checked"';}?>>Otros
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                         </div>

                         <div class="col-md-2">
                               <div class="form-group">
                                            <label>Disposicion de Aguas Grises (19)</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguagris" id="aguagris" value="1" required <?php if($aguasgris==1){ echo 'checked="checked"';}?>>Eliminacion por Alcantarillado (1)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguagris" id="aguagris" value="2" <?php if($aguasgris==2){ echo 'checked="checked"';}?>>Sistema de Pozo Resumidero (2)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguagris" id="aguagris" value="3" <?php if($aguasgris==3){ echo 'checked="checked"';}?>>Cielo Abierto (3)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguagris" id="aguagris" value="4"  <?php if($aguasgris==4){ echo 'checked="checked"';}?>>A la Calle (4)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguagris" id="aguagris" value="5" <?php if($aguasgris==5){ echo 'checked="checked"';}?>>Rios (5)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguagris" id="aguagris" value="6" <?php if($aguasgris==6){ echo 'checked="checked"';}?>>Otros
                                                </label>
                                            </div>
                                        </div>
                         </div>

                           
                         <div class="col-md-3">
                            
                               <div class="form-group">
                                            <label>Disposicion de Aguas Negras (20)</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguasnegras" id="aguasnegras" value="1" required <?php if($aguasnegras==1){ echo 'checked="checked"';}?>>Alcantarillado por Pozo Resumidero (1)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguasnegras" id="aguasnegras" value="2" <?php if($aguasnegras==2){ echo 'checked="checked"';}?>>Alcantarillado Sin Tratamiento (2)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguasnegras" id="aguasnegras" value="3" <?php if($aguasnegras==3){ echo 'checked="checked"';}?>>Otros
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aguasnegras" id="aguasnegras" value="4" <?php if($aguasnegras==4){ echo 'checked="checked"';}?>>No Aplica (3)
                                                </label>
                                            </div>
                                        </div>

                         </div>

                          <div class="col-md-2">
                                        
                                        <div class="form-group">
                                            <label>Otros</label>
                                            
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="otros[]" value="1" <?php if(in_array('1',$otros_servicios)){ echo 'checked="checked"';}?>>Energia Electrica (14)
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="otros[]" value="2" <?php if(in_array('2',$otros_servicios)){ echo 'checked="checked"';}?>>Telefono (15)
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="otros[]" value="3" <?php if(in_array('3',$otros_servicios)){ echo 'checked="checked"';}?>>Internet
                                                </label>
                                            </div>
                                              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="otros[]" value="4" <?php if(in_array('4',$otros_servicios)){ echo 'checked="checked"';}?>>Cable
                                                </label>
                                            </div>
                                             <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="otros[]" value="5" <?php if(in_array('5',$otros_servicios)){ echo 'checked="checked"';}?>>Aire Acondicionado
                                                </label>
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
                                 <button type="button" title="Atras"  class="btn btn-success btn-sm" onclick="cargarGenerales();"><i class="fa fa-chevron-left"></i>&nbsp;Anterior&nbsp;</button>
                       
                                 <button type="submit" title="Siguiente" class="btn btn-success btn-sm">Siguiente&nbsp;<i class="fa fa-chevron-right"></i></button>
                              </div>   
                            </div>  
                            </div>          
        </form>
                    
                    
                            <br>
                            <br>
                            <br>
        </div>       
</div>
  </div>
 </div>