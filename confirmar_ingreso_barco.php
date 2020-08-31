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

$nombremarinero=$_POST['nombremarinero'];
		



if ($nombremarinero == " ")
	{
		$insertbarco = "INSERT INTO barcos
				(nombre_barco,tipo_barco,puerto_barco,comentario_barco,id_cliente)
				VALUES 
				('$nombrebarco','$tipobarco','$puerto','$comentbarco','$idcli')";
	}
else 	
	{
$insertbarco = "INSERT INTO barcos
				(nombre_barco,tipo_barco,puerto_barco,comentario_barco,id_cliente,id_marinero)
				VALUES 
				('$nombrebarco','$tipobarco','$puerto','$comentbarco','$idcli','$nombremarinero')";			
	}

mysqli_query($conexion,$insertbarco) ;

$idmarinero ="SELECT nombre FROM datos_personales D INNER JOIN marineros  M ON M.id_datos = D.id_datos WHERE id_marinero = '$nombremarinero'";
$nommar=mysqli_query($conexion,$idmarinero);
$result=mysqli_fetch_array($nommar);
$nombre_marinero=$result['nombre'];



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
		<div class="border border-white">
			<div class="row ml-3">
				<div class="col-sm"><label> NOMBRE EMBARCACION </label><?php echo ":  ". $nombrebarco; ?></div>
				<div class="col-sm"><label>TIPO DE BARCO </label><?php echo":  ". $tipobarco ?></div>
				<span >
				<div class="col-sm mr-5" class="float-left"><label>PUERTO</label> <?php echo":  ". $puerto ?></div>
				</span>
			</div>
		</div>
		<div class="border border-white">
			<div class="row ml-3">
				<div class="col-sm"><label> COMENTARIO EMBARCACION </label><?php echo ":  ". $comentbarco; ?></div>
				<span >
				<div class="col-sm mr-5" class="float-left"><label>MARINERO O ENCARGADO</label> <?php echo":  ". $nombre_marinero ?></div>
				</span>
			</div>
		</div>
	</div>
</div>


<?php include("includes/footer.php"); ?>