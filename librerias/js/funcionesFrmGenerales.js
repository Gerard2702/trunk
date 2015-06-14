function verificarArea()//valida que se haya seleccionado una colonia y busca el area
{
	if($("#colonia").val()==""){
 	  	    $("#alerta").show();
 	  	    $("#alerta").html("<p>No selecciono una colonia</p>");
 	  	   	$("#colonia").focus();
 	  	   	return false;
 	  	 }
		else{
 	  	 	    $.ajax({
 	  	 	  	     type: "POST",
 	  	 	  	     url : "librerias/php/consultasFrmGeneral.php",
 	  	 	 	     data: { 
 	  	 	 	     	    colonia_nombre:$("#colonia").val(),
 	  	 	 	     	    funcion:"verificarArea",
 	  	 	 	     	    }, 
 	  	 	 	     success: function(respuesta){ 
 	  	 	 	     	       	 	 	     	      
 	  	 	 	     	if(respuesta=="urbana"){
 	  	 	 		$("#area").val("urbana");
 	  	 	 	        }
 	  	 	 	    else{
 	  	 	 	     $("#area").val("rural");   
 	  	 	 	     	          }  
 	  	 	 	     	 }//fin del succes function
                    }); //fin del ajax 

 	  	 	}
}