function cargarConstruccion(){
  $("#contenido").hide();
  $("#contenido").fadeIn(500);
  $('#contenido').load('librerias/formularios/frm_construccion_servicios.php');
  window.parent.window.location = '#inicio';
}

function cargarGenerales(){

  var listaVulnerabilidad = $("input[name='vulnerabilidad[]']:checked").map(function (){
    return this.value;
    }).get();
    var listaOtrosServicios = $("input[name='otros[]']:checked").map(function (){
    return this.value;
    }).get();
    
    $.ajax({

        type: "POST",
        url: "librerias/php/guardarVariables.php",
        data: { 
          funcion: "formulario2",
          matparedes: $("#matparedes:checked").val(),
          matpiso: $("#matpiso:checked").val(),
          mattecho: $("#mattecho:checked").val(),
          tipoletrina: $("#tipoletrina:checked").val(),
          manbasura: $("#manbasura:checked").val(),
          abastagua: $("#abastagua:checked").val(),
          aguagris: $("#aguagris:checked").val(),
          aguasnegras: $("#aguasnegras:checked").val(),
          vulnerabilidad: listaVulnerabilidad, 
          otros_servicios: listaOtrosServicios, 
        },
               
        success: function(respuesta){ 
          $("#contenido").hide();
          $("#contenido").fadeIn(500);
              $('#contenido').load('librerias/formularios/frm_datos_generales.php');
  window.parent.window.location = '#inicio';                         
      }//fin del succes function
    }); //fin del ajax */ 

  
}

function cargarFamilia(){
  $("#contenido").hide();
  $("#contenido").fadeIn(500);
  $('#contenido').load('librerias/formularios/frm_datos_familia.php');
  window.parent.window.location = '#inicio';
}

function cargarCensada(){
  $("#contenido").hide();
  $("#contenido").fadeIn(500);
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


function cargarFrmPersonas(){
  var listaIngresos = $("input[name='ingresos[]']:checked").map(function (){
    return this.value;
    }).get();
  var listaPatrimonio = $("input[name='patrimonio[]']:checked").map(function (){
    return this.value;
    }).get();

  $.ajax({

        type: "POST",
        url: "librerias/php/guardarVariables.php",
        data: { 
          funcion: "formulario3",
          ingresos: listaIngresos, 
          patrimonio: listaPatrimonio,
        },
               
        success: function(respuesta){ 
          $("#contenido").hide();
          $("#contenido").fadeIn(500);
              $('#contenido').load('librerias/formularios/frm_registro_personas.php');
   window.parent.window.location = '#inicio';                          
      }//fin del succes function
    }); //fin del ajax */
  
}

function editarPersona(id_persona){
  $.ajax({          
  type:"POST",
  url:"librerias/formularios/frm_editar_personas.php",
  dataType:"text",
  data:{
    idpersona: id_persona,
  },
  success: function(respuesta){
    $("#contenido").hide();
    $("#contenido").fadeIn(500);
    window.parent.window.location = '#inicio';
      $("#contenido").html(respuesta)
    }
});
}

function eliminarPersona(id_persona){
  if(confirm('Esta seguro que desea Eliminar a la Persona?')){
  $.ajax({          
  type:"POST",
  url:"librerias/php/guardarVariables.php",
  dataType:"text",
  data:{
    funcion:"eliminarPersona",
    idpersona: id_persona,
  },
  success: function(respuesta){
    cargarFamilia();
    window.parent.window.location = '#inicio'; 
    }
});
}
}

function finalizarCenso(){
  var listaIngresos = $("input[name='ingresos[]']:checked").map(function (){
    return this.value;
    }).get();
  var listaPatrimonio = $("input[name='patrimonio[]']:checked").map(function (){
    return this.value;
    }).get();

  $.ajax({
        type: "POST",
        url: "librerias/php/guardarVariables.php",
        data: { 
          funcion: "finalizarCenso",
          ingresos: listaIngresos, 
          patrimonio: listaPatrimonio, 
        },
               
        success: function(respuesta){
        alert("CENSO INGRESADO EXITOSAMENTE"); 
          $("#contenido").hide();
          $("#contenido").fadeIn(500);
              $('#contenido').load('librerias/formularios/frm_datos_generales.php');
              window.parent.window.location = '#inicio';                          
      }//fin del succes function
    }); //fin del ajax */ 
}



function cargarConstrucciondatos(){

  var listaIngresos = $("input[name='ingresos[]']:checked").map(function (){
    return this.value;
    }).get();
  var listaPatrimonio = $("input[name='patrimonio[]']:checked").map(function (){
    return this.value;
    }).get();

  $.ajax({

        type: "POST",
        url: "librerias/php/guardarVariables.php",
        data: { 
          funcion: "formulario3",
          ingresos: listaIngresos, 
          patrimonio: listaPatrimonio,
        },
               
        success: function(respuesta){ 
          $("#contenido").hide();
          $("#contenido").fadeIn(500);
              $('#contenido').load('librerias/formularios/frm_construccion_servicios.php');
              window.parent.window.location = '#inicio';                          
      }//fin del succes function
    }); //fin del ajax */ 
}

/*Sumit del formulario de datos generales y Carga el siguiente form de datos de construccion*/
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
          $("#contenido").hide();
          $("#contenido").fadeIn(500);
              $('#contenido').load('librerias/formularios/frm_construccion_servicios.php');
              window.parent.window.location = '#inicio';                          
      }//fin del succes function
    }); //fin del ajax */ 
 });

/*Sumit del formulario de construccion y Carga el siguiente form de datos familiares*/
$("#ingresar-construccion").submit(function(event){

   event.preventDefault(); /*evitamos que se recarge la página*/
    var listaVulnerabilidad = $("input[name='vulnerabilidad[]']:checked").map(function (){
    return this.value;
    }).get();
    var listaOtrosServicios = $("input[name='otros[]']:checked").map(function (){
    return this.value;
    }).get();
    
    $.ajax({

        type: "POST",
        url: "librerias/php/guardarVariables.php",
        data: { 
          funcion: "formulario2",
          matparedes: $("#matparedes:checked").val(),
          matpiso: $("#matpiso:checked").val(),
          mattecho: $("#mattecho:checked").val(),
          tipoletrina: $("#tipoletrina:checked").val(),
          manbasura: $("#manbasura:checked").val(),
          abastagua: $("#abastagua:checked").val(),
          aguagris: $("#aguagris:checked").val(),
          aguasnegras: $("#aguasnegras:checked").val(),
          vulnerabilidad: listaVulnerabilidad, 
          otros_servicios: listaOtrosServicios, 
        },
               
        success: function(respuesta){ 
          $("#contenido").hide();
          $("#contenido").fadeIn(500);
              $('#contenido').load('librerias/formularios/frm_datos_familia.php');
              window.parent.window.location = '#inicio';                          
      }//fin del succes function
    }); //fin del ajax */ 
 });

/*Ingreso de datos personales*/
 $("#datos-personales").submit(function(event){

    event.preventDefault(); /*evitamos que se recarge la página*/
    
    
    $.ajax({

        type: "POST",
        url: "librerias/php/guardarVariables.php",
        data: { 
          funcion: "registrarPersonas",
          nombres: $("#nombres").val(), 
          apellidos: $("#apellidos").val(),
          fecha_nacimiento: $("#fecha_nacimiento").val(),
          genero: $("#genero").val(),
          nacionalidad: $("#nacionalidad").val(),
          parentesco: $("#parentesco").val(),
          numfamilia: $("#numfamilia").val(),
          niveleducativo: $("#niveleducativo").val(),
          ocupacion: $("#ocupacion").val(),
          sitlaboral: $("#sitlaboral").val(),
          ingreso: $("#ingreso").val(),
          discapacidad: $("#discapacidad").val(),
          causa: $("#causa").val(),
          enfermedad: $("#enfermedad").val(),
        },
               
        success: function(respuesta){ 
          $("#contenido").hide();
          $("#contenido").fadeIn(500);
          $('#contenido').load('librerias/formularios/frm_datos_familia.php');
          window.parent.window.location = '#inicio'; 
         $("#datos-personales")[0].reset()
      }//fin del succes function
    }); //fin del ajax */ 
 });




 function guardarModificacion(idpersona){
    $.ajax({
        type: "POST",
        url: "librerias/php/guardarVariables.php",
        data: { 
          funcion: "ActualizarPersonas",
          idpersona:idpersona,
          nombres: $("#nombres").val(), 
          apellidos: $("#apellidos").val(),
          fecha_nacimiento: $("#fecha_nacimiento").val(),
          genero: $("#genero").val(),
          nacionalidad: $("#nacionalidad").val(),
          parentesco: $("#parentesco").val(),
          numfamilia: $("#numfamilia").val(),
          niveleducativo: $("#niveleducativo").val(),
          ocupacion: $("#ocupacion").val(),
          sitlaboral: $("#sitlaboral").val(),
          ingreso: $("#ingreso").val(),
          discapacidad: $("#discapacidad").val(),
          causa: $("#causa").val(),
          enfermedad: $("#enfermedad").val(),
        },      
        success: function(respuesta){ 
          
         
         cargarFamilia();
         window.parent.window.location = '#inicio';
         $("#datos-personales-editar")[0].reset()
          
          
      }//fin del succes function
    }); //fin del ajax 
}
