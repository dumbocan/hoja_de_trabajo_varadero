<?php 
include("includes/header.php");
include 'conexbd.php';
 ?>
<br />
<br />
<br />

editar

<?php
if(isset($_POST['editar']))
{
$id_datos = ($_POST['id']);

$sql_datos="SELECT * FROM datos_personales D left JOIN clientes C ON c.id_datos = D.id_datos left JOIN barcos B ON b.id_cliente = C.id_cliente WHERE D.id_datos = $id_datos";
$res_sql_datos = mysqli_query($conexion, $sql_datos);
while ($consulta = mysqli_fetch_array($res_sql_datos))
{
        $nombre = $consulta['nombre'];
        $direccion = $consulta['direccion'];
        $telefono1 = $consulta['telefono1'];
        $telefono2 = $consulta['telefono2'];
        $email = $consulta['email1'];
        $documento = $consulta['documento'];
echo $nombre;
echo $direccion;
}

}
    else 
    {
        if(isset($_POST['eliminar']));
        echo "eliminar";
    }
?>

<?php include("includes/footer.php"); ?>