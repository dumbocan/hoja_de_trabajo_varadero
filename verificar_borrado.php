<?php
include ("includes/header.php"); 
include ("conexbd.php");
$id=$_POST['id'];

$_DELETE_SQL = "DELETE FROM datos_personales WHERE id_datos ='$id'";
              mysqli_query($conexion,$_DELETE_SQL);
?>
<div class="row m-0 justify-content-center align-items-center vh-100">
	<div class="alert alert-primary" role="alert">
		<div class="row">
			<div class="col-sm-10">
    		<h1 class="text-uppercase" class="align-items-center"  >CONTACTO ELIMINADO DE LA BASE DE DATOS</h1>
    	</div>    			 
 			<div class="col-sm-2"> 
    		<a href="inicio3.php" type="button" class="btn btn-primary" >OK</a> 
    	</div>    	
    </div>
	</div>
</div>
<?php include ("includes/footer.php"); ?>