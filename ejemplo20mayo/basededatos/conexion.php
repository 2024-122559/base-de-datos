<?php 
   // definir las variables
   $servidor = "fdb1028.awardspace.net";
   $usuario = "4599075_ciudadanos";
   $password = "emmanuelvalen10"; // usuario root no tiene contraseña
   $basededatos = "4599075_ciudadanos";

   // conexión con mysqli
   $conexion = mysqli_connect($servidor, $usuario, $password, $basededatos);
   if (!$conexion) {
       die("Error en conexión: " . mysqli_connect_error());
   }
?>
