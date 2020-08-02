<?php

//abro la conexion de la base de datos varadero2.1 en la variable $conexion

$usuario = "javier";
$contraseña = "monleon";
$host = "localhost";
$dbname = "varadero2.1";

$conexion = new mysqli($host,$usuario,$contraseña,$dbname);
if ($conexion->connect_errno) {
			echo "Nuestro sitio experimenta fallos";
			exit();
		}
?>
