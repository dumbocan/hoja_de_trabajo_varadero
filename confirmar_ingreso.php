
<?php
include("includes/header.php");
include ("conexbd.php");

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
<?php include("includes/footer.php"); ?>