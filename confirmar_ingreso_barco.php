  <?php
include("includes/header.php");
include ("conexbd.php");
$id=$_POST['id'];
include ("includes/sql_datos_personales.php");
include ("includes/sql_cliente_marinero_tecnico.php");

$nombrebarco=$_POST['nombrebarco'];
$tipobarco=$_POST['tipobarco'];
$puerto=$_POST['puerto'];
$comentbarco=$_POST['comentbarco'];
if ($idmar == "")
	{
		$idmar=1;
	
	}
$insertbarco = "INSERT INTO barcos
				(nombre_barco,tipo_barco,puerto_barco,comentario_barco,id_cliente)
				VALUES 
				('$nombrebarco','$tipobarco','$puerto','$comentbarco','$idcli')";
mysqli_query($conexion,$insertbarco) ;
print_r($insertbarco);
echo $nombrebarco;
echo $idcli;

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


<?php include("includes/footer.php"); ?>