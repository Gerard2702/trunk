function cargarConstruccion(){
	$('#contenido').load('librerias/formularios/frm_construccion_servicios.php');
}

function cargarGenerales(){
	$('#contenido').load('librerias/formularios/frm_datos_generales.php');
}

function cargarFamilia(){
	$('#contenido').load('librerias/formularios/frm_datos_familia.php');
}

/*FUNCION PARA CARGAR EL FORMULARIO DE CONTRUCCIONES GENERALES*/
$("#ingresar-generales").submit(function(event){

    event.preventDefault(); /*evitamos que se recarge la página*/
    $('#contenido').load('librerias/formularios/frm_construccion_servicios.php');
   /* $.ajax({
        type: "POST",
        url: "registrarDatos.php",
        data: { 
          nombre: $('#nombre').val(),
          apellido: $('#apellido').val(), },
               
        success: function(respuesta){ 
                                        
          if(respuesta=="true"){
            $("#alerta").show();
            $("#alerta").html("Datos registrados exitosamente");
            document.getElementById('alerta').className="alert alert-success";
            $("#alerta").fadeOut(4000);
            $("#ingresar-datos")[0].reset()

          }
          else{

            $("#alerta").show();
            $("#alerta").html("No se registraron los datos");
            document.getElementById('alerta').className="alert alert-danger";
            $("#alerta").fadeOut(4000);
            $("#ingresar-datos")[0].reset()
                          } 
      }//fin del succes function
    }); //fin del ajax */ 
 });

/*Carga de datos familiares*/
$("#ingresar-construccion").submit(function(event){

   event.preventDefault(); /*evitamos que se recarge la página*/
   $('#contenido').load('librerias/formularios/frm_datos_familia.php');
 });

/*Ingreso de datos personales*/
 $("#datos-personales").submit(function(event){

    event.preventDefault(); /*evitamos que se recarge la página*/
    $('#exampleModal').modal('hide');/*Oculta la modal*/
    $("#datos-personales")[0].reset()
 
 });