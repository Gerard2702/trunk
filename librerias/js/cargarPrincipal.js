function cargarPagina(tipo_rol){
 /*swith para cargar los diferentes menus dependiendo del rol del usuario*/
		switch(tipo_rol){
			case 1://menu del admin
			     	$('#menu').load('modulos/admin/menuAdministrador.php');
			     	$('#contenido').load('librerias/formularios/frm_registro_usuarios.php');
			     	break;
			case 2: //menu del digitador
	       			$('#menu').load('modulos/digitador/menuDigitador.php');
	       			$('#contenido').load('librerias/formularios/frm_datos_generales.php');
				 	break;

		} //fin del switch
};