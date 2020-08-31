
  <?php
include("includes/header.php");
include ("conexbd.php");

	// traigo la id del contacto buscado para buscar sus datos en base de datos y exponerla//

$id=$_POST['id'];

include ("includes/sql_cliente_marinero_tecnico.php");
include ("includes/sql_datos_personales.php");

?>



<div class="container-fluid mt-5">
	<div class="bg-secondary">
		<div class="border border-white">
			<div class="row">
				<div class="mx-auto"><h1>HOJA DE TRABAJO</h1></div>
			</div>
		</div>
		<div class="border border-white">	
			<div class="row ml-3">
				<div class="col-sm"><label> NOMBRE </label><?php echo ":  ". $nombre; ?></div>
				<div class="col-sm"><label>DIRECCION </label><?php echo":  ". $direccion ?></div>
				<span >
				<div class="col-sm mr-5" class="float-left"><label>DOCUMENTO</label> <?php echo":  ". $documento ?></div>
				</span>
			</div>	
		</div>
		<div class="border border-white">
			<div class="row ml-3">
				<div class="col-sm">
					TELEFONO<?php echo":  ".$telefono1 ?>	
				</div>
				<div class="col-sm"><label>TELEFONO 2</label><?php echo":  ".$telefono2 ?></div>
				 <span >
				<div class="col-sm mr-5" class="float-left"><label>EMAIL</label><?php echo":  ".$email ?></div>
				</span>
			</div>
		</div>
		<div class="border border-white">
			<div class="row ml-3">
				<div class="col-sm"><label>COMENTARIO</label><?php echo":  ".$comentario ?></div>
				 <span >
				<div class="col-sm mr-5"class="float-left" ><label>ROL</label><?php echo ":  ".$rolcli.", " .$rolmar.",  " .$roltec ?></div>
				</span>
			</div>
		</div>
	</div>
</div>
<?php

$count = 0;
$sqlbarcos=("SELECT * FROM barcos WHERE id_cliente = '$idcli'");
$resulbarcos = mysqli_query($conexion,$sqlbarcos);
while ($consulbarcos=mysqli_fetch_array($resulbarcos) )
{
	$idbarco= $consulbarcos['id_barco'];
	$nombrebarco= $consulbarcos['nombre_barco'];
	$tipobarco= $consulbarcos['tipo_barco'];
	$puertobarco=$consulbarcos['puerto_barco'];
	$comenbarco=$consulbarcos['comentario_barco'];


	$count ++;
}
if ($count== '0')
	{
		?>

		<div class="container mt-5">
			<div class="row">
				<div class=col-md-3></div>
        		<div class="col-md-5">
        			<div class="mx-auto"><h1>Ingresar embarcación.</h1></div>
						<form method="POST" action="confirmar_ingreso_barco.php"> 
            			<div class="form-group">
              				<label>Nombre embarcación.</label>
                			<input type="text" class="form-control" name="nombrebarco" id="nombrebarco" >  
              				<label>Tipo de embarcación.</label>
                			<input type="text" class="form-control" name="tipobarco" id="tipobarco" > 
              				<label>Puerto </label>   
                			<input type="text" class="form-control" name="puerto" id="puerto">  
              				<label>Comentario</label>
                			<input type="text" class="form-control" name="comentbarco" id="comentbarco">
                			<label>Marinero</label>
                			<select class="custom-select" name="nombremarinero">

                				<option selected>Choose...</option>
								<option value=" ">Ninguno</option>
                			<?php
							

                			$buscamar="SELECT * FROM datos_personales D INNER JOIN marineros M ON D.id_datos = M.id_datos";
                			$buscanommar=mysqli_query($conexion,$buscamar);
                			
                			while ($datos=mysqli_fetch_array($buscanommar)):
                				$idmarinero=$datos['nombre'];
                			 	?>
                			    
                			    <option value="<?php echo $datos['id_marinero'];?>"><?php echo $idmarinero;?></option>

                			<?php 
                			 
                		endwhile;
                		
                			?>
                			</select>

                		</div>

                			<input id="id" name="id"  type="hidden" value="<?php echo $id; ?>">
                			
                			<button type="submit" class="btn btn-success mt-3" name="ingresar_embarcacion">INSERTAR EMBARCACION</button>
                		</form>
                			<form action="editar_embarcacion.php" method="POST"> 
							<button type="submit" class="btn btn-warning mt-3 ml-4" name="editar_embarcacion">EDITAR EMBARCACION</button>

							<input id="idbarco" name="idbarco"  type="hidden" value="<?php echo $idbarco; ?>">   

						</form>
						</div>

				</div>

			</div>
		</div>
    	
    	<?php
    }    
    else
    	{
    		echo ' tiene barco'.'<br>';
    		echo $idbarco.'<br>';
    		echo $nombrebarco .'<br>';
    		echo $tipobarco .'<br>';
    		echo $puertobarco.'<br>';
    		echo $comenbarco.'<br>';
    	}


?>


	





<?php include("includes/footer.php"); ?>