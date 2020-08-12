
<?php
include("includes/header.php");

// abro base de datos//
include ("conexbd.php");

//recoje los valores de las casillas check//
if(isset($_POST['propietario']) && $_POST['propietario'] == '1')
				{
					$propietario='1';
					echo "propietario";}
			else 
				{
					$propietario='0';
					}
		
			if(isset($_POST['marinero']) && $_POST['marinero'] == '1')
				{
					$marinero='1';
					echo "marinero";}
			else 
				{
					$marinero='0';
					}

			if(isset($_POST['trabajador']) && $_POST['trabajador'] == '1')
				{
					$trabajador='1';
					echo "trabajador";}
			else 
				{
					$trabajador='0';
					}
// si ninguna de las casillas check se han clicado te da error//
			if ($propietario + $marinero + $trabajador == '0' )
			 {
				?>
					<div class="row m-0 justify-content-center align-items-center vh-100">
						<div class="alert alert-primary" role="alert">
							<div class="row">
								<div class="col-sm-10">
    								<h1 class="text-uppercase" class="align-items-center"  >añadir propietario, marinero, o trabajador porfabor</h1>
    							</div>
    			 
 			 					<div class="col-sm-2"> 
    								<a href="javascript: history.go(-1)" class="btn btn-danger"  name="cancelar" id="cancelar">OK</a>  
    							</div>
    						</div>
    					</div>
					</div>
    			<?php				

			}

			else 
			{
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
<?php 
}
include("includes/footer.php"); ?>