<?php 
include("includes/header.php");
include 'conexbd.php';
 ?>
<br />
<br />
<br />

<?php
if(isset($_POST['editar']))
{
$id_datos = ($_POST['id']);
$rol =($_POST['rol']);

$sql_datos="SELECT * FROM datos_personales D    LEFT JOIN clientes C ON c.id_datos = D.id_datos 
                                                LEFT JOIN barcos B ON b.id_cliente = C.id_cliente
                                                WHERE D.id_datos = $id_datos";
$res_sql_datos = mysqli_query($conexion, $sql_datos);
while ($consulta = mysqli_fetch_array($res_sql_datos))
{
        $nombre = $consulta['nombre'];
        $direccion = $consulta['direccion'];
        $telefono1 = $consulta['telefono1'];
        $telefono2 = $consulta['telefono2'];
        $email = $consulta['email1'];
        $documento = $consulta['documento'];
        $comentariodatos = $consulta['comentario_datos'];   

        $nombrebarco =  $consulta['nombre_barco'];
        $tipobarco =  $consulta['tipo_barco'];
        $comentbarco =  $consulta['comentario_barco'];
        $puertobarco =  $consulta['puerto_barco']; 
        $comentariocli =  $consulta['comentario_cliente'];

        ?>

        <!-- composicion del formulario para editar los datos del monbre buscado-->

<div class="container-fluid">
                        <form method="POST" action="confirmar_edicion.php"> 
                        <div class="bg-secondary text-white">
                            <div class="border border-white">
                                <br />
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo $nombrebarco ?>" class="form-control" name="nombrebarco" id="nombrebaco">
                                               
                                    </div>
                                </div>      
			                    <div class="row ">
                                    <div class="col-sm-1 ml-2"><label>Nro:</label><?php echo ": ".$id_datos;?></div>
				                    <div class="col-sm-4">
                                        <label> NOMBRE </label>
                                        <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre" > 
                                    </div>
				                    <div class="col-sm-4">
                                        <label>DIRECCION </label>
                                        <input type="text" value="<?php echo $direccion; ?>" class="form-control" name="direccion" id="direccion" > 
                                    </div>			                    
				                    <div class="col-sm mr-4">
                                        <label>TELEFONO</label>
                                    <input type="tel" value="<?php echo $telefono1; ?>" class="form-control" name="telefono1" id="telefono1">
                                    </div>
			                    </div>
                                <div class="row">
                                    <div class="col-sm-1">

                                    </div>
                                    <div class="col-sm-3">
                                        <label>TELEFONO 2</label>   
                                        <input type="tel" value="<?php echo $telefono2; ?>" class="form-control" name="telefono2" id="telefono2">
                                    </div>				 
				                    <div class="col-sm-3">
                                        <label>EMAIL</label>
                                        <input type="email" value="<?php echo $email; ?>" class="form-control" name="email" id="email">
                                    </div>
				                    <div class="col-sm-3">  
                                        <label>DOCUMENTO</label>
                                       <input type="text" value="<?php echo $documento; ?>" class="form-control" name="documento" id="documento">
                                    </div>
                                   
                                    <?php
                                    
/* se dan valores a checkbox*/
                                    $rolcli = 0;
                                    $rolmar = 0;
                                    $roltec = 0;

                                    if (strpos($rol, 'Cliente') !== false)  
                                    {
                                        $rolcli = 'checked';
                                    }

                                    if (strpos($rol, 'Marinero') !== false) 
                                    {
                                        $rolmar = 'checked';
                                    }

                                    if (strpos($rol, 'Tecnico') !== false) 
                                    {
                                        $roltec = 'checked';
                                    }


                                    ?>       

                                    <!--pintar y dar valor a celdas de check box.  --> 

                                    <div class="container mt-4">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <div class="form-group form-check">               
                                                    <input type="checkbox" class="form-check-input" id="cliente" name="cliente" value="1" <?php echo $rolcli; ?>>
                                                    <label class="form-check-label" for="cliente-check">Cliente</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="marinero" name="marinero" value="1" <?php echo $rolmar; ?>>
                                                    <label class="form-check-label" for="marinero-check">Marinero</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="tecnico"  name="tecnico" value="1" <?php echo $roltec; ?>>
                                                    <label class="form-check-label" for="tecnico-check">Tecnico</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm mr-4">
                                        <label>COMENTARIO DATOS PERSONALES</label>
                                        <input type="text" value="<?php echo $comentariodatos; ?>" class="form-control" name="comentariodatos" id="comentariodatos">  
                                    </div>
                                </div>
                                -->
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm mr-4">
                                        <label>COMENTARIO CLIENTE</label>
                                        <input type="text" value="<?php echo $comentariocli; ?>" class="form-control" name="comentariocli" id="comentariocli">  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm">
                                        <label>NOMBRE EMBARCACION</label>
                                        <input type="text" value="<?php echo $nombrebarco; ?>" class="form-control" name="nombrebarco" id="nombrebarco">  
                                    </div>
                                    <div class="col-sm">
                                        <label>TIPO EMBARCACION</label>
                                        <input type="text" value="<?php echo $tipobarco; ?>" class="form-control" name="tipobarco" id="tipobarco">
                                    </div>
                                    <div class="col-sm mr-4">    
                                        <label>PUERTO EMBARCACION</label>
                                        <input type="text" value="<?php echo $puertobarco; ?>" class="form-control" name="puertobarco" id="puertobarco">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm mr-4">
                                        <label>COMENTARIO EMBARCACION</label>
                                        <input type="text" value="<?php echo $comentbarco; ?>" class="form-control" name="comentbarco" id="comentbarco">
                                    </div>
                                </div>
                              <br />
                            </div>
                        </div>
                        </form>

<div class=" text-white">
    <div class="container mt-5" >
        <div class="row">
            <div class=col-md-3></div>
                <div class="col-md-5">
                    <h2> Agregar elementos </h2>

<!-- Mando todos los datos por post a la pagina confirmar edicion-->

                        <form method="POST" action="confirmar_edicion.php"> 
                        <div class="form-group">               
                            <input type="int" style= "color: white" readonly class="form-control-plaintext" id="id" value="<?php echo $id_datos; ?>"
                             name="id"> 
                            <label>Nombre</label>               
                                <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre" >  
                            <label>Dirección</label>
                                <input type="text" value="<?php echo $direccion; ?>" class="form-control" name="direccion" id="direccion" > 
                            <label>Telefono</label>   
                                <input type="telephone" value="<?php echo $telefono1; ?>" class="form-control" name="telefono1" id="telefono1">  
                            <label>Telefono 2</label>
                                <input type="telephone" value="<?php echo $telefono2; ?>" class="form-control" name="telefono2" id="telefono2">
                            <label>Email</label>  
                                <input type="email" value="<?php echo $email; ?>" class="form-control" name="email" id="email">  
                            <label>Comentario</label>
                                <input type="text" value="<?php echo $comentariodatos; ?>" class="form-control" name="comentario" id="comentario">  
                            <label>Documento</label>
                                <input type="text" value="<?php echo $documento; ?>" class="form-control" name="documento" id="documento">
                            
                       <?php
                       echo $rol;
}

}
    else 
    {
        if(isset($_POST['eliminar']));
        echo "eliminar";
    }
?>

<?php include("includes/footer.php"); ?>