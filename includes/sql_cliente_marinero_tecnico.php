<?php
$idcli="";
$idmar="";
$idtec="";
$rolcli="";
$rolmar="";
$roltec="";


$sqlcli="SELECT * FROM clientes WHERE id_datos = '$id'";
$resulcli=mysqli_query($conexion,$sqlcli);
while ($consulcli = mysqli_fetch_array($resulcli))
	{
		$idcli = $consulcli ['id_cliente'];

	}
if ($idcli) {$rolcli="Cliente";}

$sqlmar="SELECT * FROM marineros WHERE id_datos = '$id'";
$resulmar=mysqli_query($conexion,$sqlmar);
while ($consulmar = mysqli_fetch_array($resulmar))
	{
		$idmar = $consulmar ['id_marinero'];
	}
if ($idmar) {$rolmar="Marinero";}

$sqltec="SELECT * FROM tecnicos WHERE id_datos = '$id'";
$resultec=mysqli_query($conexion,$sqltec);
while ($consultec = mysqli_fetch_array($resultec))
	{
		$idtec = $consultec ['id_tecnico'];
	}
if($idtec) {$roltec="Tecnico";}
?>