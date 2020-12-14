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
			<div class="row">
				<div class="col-sm-9"></div>
					<form method="POST" action="verificar_borrado.php">
					<div class="col-sm-1">
						<input name="id" type="hidden" value="<?php echo $id; ?>">
              			<button class="btn btn-success" name="borrar" type="submit">BORRAR</button>
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
</div>
<?php include("includes/footer.php"); ?>