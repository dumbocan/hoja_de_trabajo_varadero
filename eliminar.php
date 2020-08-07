<?php include("includes/header.php"); 
 
//include_once 'conexbd.php';
$id=$_POST['id'];
$nombre=$_POST['nombre']; 

// Recupero las variables id y nombre enviadas por post para mostrar en pantaya//  
?>
<div class="row m-0 justify-content-center align-items-center vh-100">
	<div class="col-sm-10">
		<div class="alert alert-primary" role="alert"> 
    		<div class="row"> 
    			<h1 class="text-uppercase" class="align-items-center"  >ESTAS SEGURO DE QUERER ELIMINAR A <?php echo $nombre ; ?></h1> 
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-sm-9"></div>
					<form method="POST" action="verificar_borrado.php">
					<div class="col-sm-1">
					<button  class="btn btn-primary"  type="submit" name="borrar" id="borrar">BORRAR</button>
				</div>
					
					</form>
				<div class="col-sm-1">
						<!-- boton regreso atras -->
					<a href="javascript: history.go(-1)" class="btn btn-danger"  name="cancelar" id="cancelar">CANCELAR</a>
				</div>
			</div>  
		</div>
	</div>		
</div>
<?php 

/*if (isset($_POST['borrar']))
{
	$_DELETE_SQL = "DELETE FROM datos_personales WHERE id_datos ='$id'";
							mysqli_query($conexion,$_DELETE_SQL);

		if ($id<>"0"){
			header("location: http://localhost/programacion/varadero/verificar_borrado.php");
		}
} */
   		
  ?>  			
<?php include("includes/footer.php"); ?>