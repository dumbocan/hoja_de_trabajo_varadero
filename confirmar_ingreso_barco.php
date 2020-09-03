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

if ($nombremarinero =="1") 
{?>
	 <div class="container mt-5" >
    <div class="row">
      <div class=col-md-3></div>
        <div class="col-md-5">
          <h2> Agregar Marinero </h2>
          <form method="POST" action="confirmar_ingreso_marinero.php"> 
            <div class="form-group">
              <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" >  
              <label>Dirección</label>
                <input type="text" class="form-control" name="direccion" id="direccion" > 
              <label>Telefono</label>   
                <input type="telephone" class="form-control" name="telefono1" id="telefono1">  
              <label>Telefono 2</label>
                <input type="telephone" class="form-control" name="telefono2" id="telefono2">
              <label>Email</label>  
                <input type="email" class="form-control" name="email" id="email">  
              <label>Comentario</label>
                <input type="text" class="form-control" name="comentario" id="comentario">  
              <label>Documento</label>
                <input type="text" class="form-control" name="documento" id="documento">
            </div>
            
                
                
              </div>
            </div>
            <div class="container mt-5">
              <div class="form-group">  
                <div class="row">
                  <div class="col-md-7">  </div>  
                    <div class="col-md-3">  
                      <button type="submit" class="btn btn-success" name="ingresar_btn">Ingresar</button>
                    </div>
                    <div class="col-md-2">
                      <a href="inicio3.php" class="btn btn-primary" name="buscar_btn">Buscar</a>
                    </div>
                  </div>  
                </div>  
              </div>
            </div>
          </form> 
        </div>  
      </div>
    </div>    
  </div>
	<?php

	}

	else
	{
		
	if ($nombremarinero == " ")
	{
		$insertbarco = "INSERT INTO barcos
				(nombre_barco,tipo_barco,puerto_barco,comentario_barco,id_cliente)
				VALUES 
				('$nombrebarco','$tipobarco','$puerto','$comentbarco','$idcli')";
				$nombre_marinero='ninguno';

	}
	else 	
	{
		$insertbarco = "INSERT INTO barcos
				(nombre_barco,tipo_barco,puerto_barco,comentario_barco,id_cliente,id_marinero)
				VALUES 
				('$nombrebarco','$tipobarco','$puerto','$comentbarco','$idcli','$nombremarinero')";	
		$idmarinero ="SELECT nombre FROM datos_personales D INNER JOIN marineros  M ON M.id_datos = D.id_datos WHERE id_marinero = '$nombremarinero'";
		$nommar=mysqli_query($conexion,$idmarinero);
		$result=mysqli_fetch_array($nommar);
		$nombre_marinero=$result['nombre'];

}
	}

mysqli_query($conexion,$insertbarco) ;






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
<?php

 
include("includes/footer.php"); ?>