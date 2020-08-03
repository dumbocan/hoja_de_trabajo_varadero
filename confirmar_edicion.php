
<?php

// llamo a la base de datos y recojo los valores que me manda por post ya cambiados y los actualiza en la base de datos//
include("includes/header.php");
include 'conexbd.php';
$existe =0;
$id= $_POST['id'];
$nombre= $_POST['nombre'];
$direccion= $_POST['direccion'];
$telefono1= $_POST['telefono1'];
$telefono2= $_POST['telefono2'];
$email= $_POST['email'];
$documento=$_POST['documento'];
$comentario=$_POST['comentario'];

if(isset($_POST['insertar_btn']))
   {
      
  
$update ="UPDATE datos_personales SET  
         nombre='$nombre',
         direccion='$direccion',
         telefono1='$telefono1',
         telefono2='$telefono2',
         email1='$email',
         comentario='$comentario',
         documento='$documento'
         WHERE 
         id_datos='$id'";
   mysqli_query($conexion,$update);
   
}          
?>

<div class="row m-0 justify-content-center align-items-center vh-100">
	<div class="alert alert-primary" role="alert">
		<div class="row">
			<div class="col-sm-10">
    			<h1 class="text-uppercase" class="align-items-center"  >EL CONTACTO SE HA ACTUALIZADO CON EXITO</h1>
    		</div>
    			 
 			 <div class="col-sm-2"> 
    			<a href="inicio3.php" type="button" class="btn btn-primary" >OK</a> 
    		</div>
    		
    	
    	</div>
	</div>
</div>
<?php include("includes/footer.php"); ?>