<!DOCTYPE html>
<html>
<head>
<!-- codigo para poder tener caracteres en español y acentos -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html lang="es">                                                                  <!-- bootstrap -->
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">

	<title>Confirmar ingreso</title>
</head>
<body>
	<!--poner pagina color negro en css y letra blanca-->
   <style>
      body {background-color: black;}
      color :{white};
   </style>
<div class=" text-white">

<?php
include_once 'conexbd.php'; 

// abro base de datos//
// Si aprieto el boton insertar, meto todos los campos en la base de datos //
if(isset($_POST['insertar_btn']))
	{
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$telefono1=$_POST['telefono1'];
		$telefono2=$_POST['telefono2'];
		$email=$_POST['email'];
		$comentario=$_POST['comentario'];
		$documento=$_POST['documento'];

			if ($nombre =="" || $documento =="")
				{
					echo "Al menos el nombre y documento son obligatorios";
				}
			else 
				{
					mysqli_query($conexion, "INSERT INTO datos_personales 
					(nombre,direccion,telefono1,telefono2,email1,comentario,documento) VALUES ('$nombre','$direccion','$telefono1','$telefono2','$email','$comentario','$documento')");
					
				}

	}

//presento una caja con texto centrado y boton ok con hiperlink a inicio//

?>
<div class="row m-0 justify-content-center align-items-center vh-100">
	<div class="alert alert-primary" role="alert">
		<div class="row">
			<div class="col-sm-10">
    			<h1 class="text-uppercase" class="align-items-center"  >CONTACTO INGRESADO EN LA BASE DE DATOS</h1>
    		</div>
    			 
 			 <div class="col-sm-2"> 
    			<a href="inicio3.php" type="button" class="btn btn-primary" >OK</a> 
    		</div>
    		
    	
    	</div>
	</div>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
</body>
</html>	