  <?php
include("includes/header.php");
include ("conexbd.php");

$id=$_POST['id'];

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

?>
<!--<table class="table table-sm table-dark">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th scope="col"><H1>FORMULARIO CLIENTE</H1></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>NOMBRE: <?php echo $nombre ?></td> 
			<td>DIRECCION: <?php echo $direccion ?> </td>
			<td>TELEFONO: <?php echo $telefono1 ?></td>
			<td>TELEFONO 2: <?php echo $telefono2 ?></td>
			<td>EMAIL: <?php echo $email ?></td>

    </tr>
</tbody>
</table>

-->
<div class="container-fluid mt-5">
	<div class="bg-secondary text-white">
		<div class="border border-white">
			<div class="border border-white">

				
					
					<center><h1>HOJA DE TRABAJO</h1></center>
					
				</div>
			
		
		<div class="row">
			<div class="col-sm-4">
            	<div class="form-group row"> 
                  <label for="id" class="col-sm-3 col-form-label ml-5">NOMBRE:</label>
                  <div class="col-sm-7">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="nombre" value="<?php echo $nombre ?>"
                     name="nombre"> 
                  </div>     
                </div>
            </div>
			<div class="col-sm-5">
            	<div class="form-group row"> 
                  <label for="id" class="col-sm-2 col-form-label">DIRECCION:</label>
                  <div class="col-sm-10">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="direccion" value="<?php echo $direccion ?>"
                     name="direccion"> 
                  </div>     
                </div>
            </div>
         	<div class="col-sm-3">
            	<div class="form-group row"> 
                  <label for="documento" class="col-sm-4 col-form-label">DOCUMENTO:</label>
                  <div class="col-sm-7">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="documento" value="<?php echo $documento ?>"
                     name="documento"> 
                  </div>     
                </div>
            </div>
            
        </div>
        <div class="row">

        	<div class="col-sm-3">
            	<div class="form-group row"> 
                  <label for="telefono1" class="col-sm-4 col-form-label ml-5">TELEFONO:</label>
                  <div class="col-sm-6">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="telefono1" value="<?php echo $telefono1 ?>"
                     name="telefono1"> 
                  </div>     
                </div>
            </div>

            <div class="col-sm-3">
            	<div class="form-group row"> 
                  <label for="telefono2" class="col-sm-4 col-form-label">TELEFONO 2:</label>
                  	<div class="col-sm-8">
                     	<input type="text" style= "color: white" readonly class="form-control-plaintext" id="telefono2" value="<?php echo $telefono2 ?>"
                     	name="telefono2"> 
                  	</div>     
                </div>
            </div>
            <div class="col-sm-3">
            	<div class="form-group row"> 
                  <label for="email" class="col-sm-2 col-form-label">EMAIL:</label>
                  <div class="col-sm-9">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="email" value="<?php echo $email ?>"
                     name="email"> 
                  </div>     
                </div>
            </div>

            
            
            <div class="col-sm-2">
            <div class="form-group row"> 
                  <label for="rol" class="col-sm-2 col-form-label">ROL:</label>
                 <div class="col-sm-10">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="rol" value="<?php echo $rolcli."  " .$rolmar."  " .$roltec ?>"
                     name="rol"> 
                  </div>     
               </div>
            </div>

        </div>

        <div class="row">
         

         	<div class="col-sm-11">
            	<div class="form-group row"> 
                  <label for="comentario" class="col-sm-1 col-form-label ml-5">COMENTARIO:</label>
                  <div class="col-sm">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="comentario" value="<?php echo $comentario ?>"
                     name="comentario"> 
                  </div>     
                </div>
            </div>
        </div>
    </div>
</div>    
</div>
<?php include("includes/footer.php"); ?>