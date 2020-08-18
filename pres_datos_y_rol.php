  <?php
include("includes/header.php");
include ("conexbd.php");

$id=$_POST['id'];

$idcli="";
$idmar="";
$idtec="";
echo "$id<br>";



$sqlcli="SELECT * FROM clientes WHERE id_datos = '$id'";
$resulcli=mysqli_query($conexion,$sqlcli);
while ($consulcli = mysqli_fetch_array($resulcli))
	{
		$idcli = $consulcli ['id_cliente'];
	}

$sqlmar="SELECT * FROM marineros WHERE id_datos = '$id'";
$resulmar=mysqli_query($conexion,$sqlmar);
while ($consulmar = mysqli_fetch_array($resulmar))
	{
		$idmar = $consulmar ['id_marinero'];
	}

$sqltec="SELECT * FROM tecnicos WHERE id_datos = '$id'";
$resultec=mysqli_query($conexion,$sqltec);
while ($consultec = mysqli_fetch_array($resultec))
	{
		$idtec = $consultec ['id_tecnico'];
	}

$sqldatos="SELECT * FROM datos_personales WHERE id_datos  = '$id'";
$resultados = mysqli_query($conexion,$sqldatos);
while ($consulta = mysqli_fetch_array($resultados))
	{
		$id= $consulta ['id_datos'];
		$nombre= $consulta ['nombre'];
		$direccion= $consulta ['direccion'];
		$telefono1= $consulta ['telefono1']; 
		$telefono2= $consulta ['telefono2'];
		$email= $consulta['email1'];
		$documento= $consulta['documento'];
		$comentario= $consulta['comentario'];
	}



echo "$nombre<br>";  
echo "$direccion<br>";
echo "$telefono1<br>";
echo "$telefono2<br>";
echo "$email<br>";
echo "$documento<br>";
echo "$comentario<br>";
echo "$idcli<br>";
echo "$idmar<br>";
echo "$idtec<br>";






include("includes/footer.php"); ?>