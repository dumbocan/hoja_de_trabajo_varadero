<?php
$sqldatos="SELECT * FROM datos_personales WHERE id_datos  = '$id'";
$resultados = mysqli_query($conexion,$sqldatos);
while ($consulta = mysqli_fetch_array($resultados))
	{
		$id= $consulta ['id_datos'];
		$nombre= $consulta ['nombre'];
		$direccion= $consulta ['direccion'];
		$telefono1= $consulta ['telefono1']; 
		$telefono2= $consulta ['telefono2'];
		$email= $consulta['email1'];
		$documento= $consulta['documento'];
		$comentario= $consulta['comentario'];
	}
?>	