/*en este primer bloque de codigo jquery trabajamos la parte del login */

    $("#login").submit(function(event){ 

    event.preventDefault(); /*evitamos que se recarge la página*/
    $.ajax({
 	  	 	type: "POST",
 	  	 	url: "librerias/php/validar-login.php",
 	  	 	data: { 
 	  	 	 	usuario: $('#inputUser').val(),
 	  	 	 	contraseña: $('#inputPassword').val(), },
 	  	 	 	     
 	  	 	success: function(respuesta){ 
 	  	 	 	     	       	 	 	     	      
 	  	 	 	if(respuesta=="true"){
 	  	 	 		window.location.replace("principal.php");
 	  	 	 	}
 	  	 	 	else{
 	  	 	 	    $("#alerta").show();
    				$(".conten-alert").html("Usuario o Contraseña incorrecto");
    				$("#login")[0].reset()
 	  	 	 	     	          } 
 	  	 	 	}//fin del succes function

             }); //fin del ajax  
   });