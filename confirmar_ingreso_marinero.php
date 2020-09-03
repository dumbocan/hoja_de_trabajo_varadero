  <?php
include("includes/header.php");
include ("conexbd.php");



if(isset($_POST['ingresar_btn']))
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
					?>
					<div class="row m-0 justify-content-center align-items-center vh-100">
						<div class="alert alert-primary" role="alert">
							<div class="row">
								<div class="col-sm-10">
    								<h1 class="text-uppercase" class="align-items-center"  >Al menos el nombre y documento son obligatorios</h1>
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
					$sqldatos="INSERT INTO datos_personales 
					(nombre,direccion,telefono1,telefono2,email1,comentario,documento) VALUES
					('$nombre','$direccion','$telefono1','$telefono2','$email','$comentario','$documento')";
					mysqli_query($conexion,$sqldatos);		
  					$last_id = mysqli_insert_id($conexion);
 				 	echo "New record created successfully. Last inserted ID is: " . $last_id;
 				 	
 				 	
 				 	
 				 		$sqlmar="INSERT INTO marineros
 				 		(id_datos)
 				 		VALUES
 				 		($last_id)";
 				 		mysqli_query($conexion,$sqlmar);
 				 	

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
}







?>
<?php include("includes/footer.php"); ?>