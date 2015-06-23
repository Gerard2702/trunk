function cargarConstruccion(){
	$('#contenido').load('librerias/formularios/frm_construccion_servicios.php');
  window.parent.window.location = '#inicio';
}

function cargarGenerales(){
	$('#contenido').load('librerias/formularios/frm_datos_generales.php');
  window.parent.window.location = '#inicio';
}

function cargarFamilia(){
	$('#contenido').load('librerias/formularios/frm_datos_familia.php');
  window.parent.window.location = '#inicio';
}

function cargarCensada(){
  $('#contenido').load('librerias/formularios/frm_datos_generales.php');
}
function cargarNoCensada(){
	$('#contenido').load('librerias/formularios/frm_vivienda_no_censada.php');
}

function cargarBusquedaReligion(){
	$('#contenido').load('librerias/formularios/busqueda_religion.php');
}

function cargarBusquedaTenencia(){
	$('#contenido').load('librerias/formularios/busqueda_tenencia_vivienda.php');
}

function cargarBusquedaTipoFamilia(){
	$('#contenido').load('librerias/formularios/busqueda_tipo_familia.php');
}


/*FUNCION PARA CARGAR EL FORMULARIO DE CONTRUCCIONES GENERALES*/
$("#ingresar-generales").submit(function(event){

    event.preventDefault(); /*evitamos que se recarge la página*/
    var listaValoresCheckboxes = $("input[name='vectores[]']:checked").map(function (){
    return this.value;
    }).get();
    /*CARGA EL SIGUIENTE FORMULARIO $('#contenido').load('librerias/formularios/frm_construccion_servicios.php');*/
    $.ajax({

        type: "POST",
        url: "librerias/php/guardarVariables.php",
        data: { 
          funcion: "formulario1",
          fecha_censado: $('#fecha_censado').val(),
          departamento:  $('#departamento').val(),
          municipio:  $('#municipio').val(),
          colonia:  $('#colonia').val(),
          pasaje:  $('#pasaje').val(),
          num_vivienda:  $('#numvivienda').val(),
          Areaa:  $('#area').val(),
          tipo_familia:  $('#tipo_familia').val(),
          cantidad_familia:  $('#can_familia').val(),
          religion:  $('#religion').val(),
          tenencia: $('#tenencia').val(),
          seguridad: $('#seguridad').val(),
          perros: $('#perros').val(),
          gatos: $('#gatos').val(),
          otras_mascotas: $('#otras_mascotas').val(),
          observaciones: $('#observaciones').val(),
          vectores: listaValoresCheckboxes, 
         
        },
               
        success: function(respuesta){ 
              $('#contenido').load('librerias/formularios/frm_construccion_servicios.php');
              window.parent.window.location = '#inicio';                          
          /*if(respuesta=="true"){
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
                          } */
      }//fin del succes function
    }); //fin del ajax */ 
 });

/*Carga de datos familiares*/
$("#ingresar-construccion").submit(function(event){

   event.preventDefault(); /*evitamos que se recarge la página*/
   $('#contenido').load('librerias/formularios/frm_datos_familia.php');
   window.parent.window.location = '#inicio';
 });

/*Ingreso de datos personales*/
 $("#datos-personales").submit(function(event){

    event.preventDefault(); /*evitamos que se recarge la página*/
    $('#exampleModal').modal('hide');/*Oculta la modal*/
    $("#datos-personales")[0].reset()
    window.parent.window.location = '#inicio';
 
 });