<?php
     
 $con = mysql_connect('localhost', 'root', '')
 or die('No se pudo conectar: ' . mysql_error());
 $db= mysql_select_db('prueba') or die('No se pudo seleccionar la base de datos');            
  
 ?>