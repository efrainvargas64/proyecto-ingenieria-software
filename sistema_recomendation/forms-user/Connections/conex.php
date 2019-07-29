<?php
$hostname_conex = "localhost";
$database_conex = "login";
$username_conex = "root";
$password_conex = "";
// creación de la conexión a la base de datos con mysql_connect()
$conex = mysqli_connect($hostname_conex, $username_conex, $password_conex, $database_conex) or
die ("Base de datos no conectada, intente nuevamente!");

?>
