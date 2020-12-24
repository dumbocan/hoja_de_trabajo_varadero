
<?php
include("includes/header.php");

// abro base de datos//
include ("conexbd.php");

//recoje los valores de las casillas check//
$cliente='0';
$marinero='0';
$tecnico='0';

if(isset($_POST['cliente']) && $_POST['cliente'] == '1')
	{$cliente='1';}
		
if(isset($_POST['marinero']) && $_POST['marinero'] == '1')
	{$marinero='1';}
								
if(isset($_POST['tecnico']) && $_POST['tecnico'] == '1')
	{$tecnico='1';}		

// si ninguna de las casillas check se han clicado te da error//
			if ($cliente + $marinero + $tecnico == '0' )
			 {
				?>
					<div class="row m-0 justify-content-center align-items-center vh-100">
						<div class="alert alert-primary" role="alert">
							<div class="row">
								<div class="col-sm-10">
    								<h1 class="text-uppercase" class="align-items-center"  >añadir cliente o tecnico porfavor</h1>
    							</div>
    			 
 			 					<div class="col-sm-2"> 
    								<a href="javascript: history.go(-1)" class="btn btn-danger"  name="cancelar" id="cancelar">OK</a>  
    							</div>
    						</div>
    					</div>
					</div>
    			<?php				

			}

			else 
			{

// Si aprieto el boton insertar, meto todos los campos en la base de datos //
if(isset($_POST['ingresar_btn']))
	{
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$telefono1=$_POST['telefono1'];
		$telefono2=$_POST['telefono2'];
		$email=$_POST['email'];
        $nombrebarco=$_POST['nombrebarco'];
        $tipobarco=$_POST['tipobarco'];
        $puertobarco=$_POST['puertobarco'];
        $comentbarco=$_POST['comentbarco'];	
		$documento=$_POST['documento'];
        $nomarinero=$_POST['nombre_marinero'];

       
        
// si no se insertan nombre o documento da fallo//
          
			if ($nombre =="" || $documento =="")
				{
					?>
					<div class="row m-0 justify-content-center align-items-center vh-100">
						<div class="alert alert-primary" role="alert">
							<div class="row">
								<div class="col-sm-10">
    								<h1 class="text-uppercase" class="align-items-center"  >Al menos el nombre y documento son obligatorios</h1>
    							</div>
    			 
 			 					<div class="col-sm-2"> 
    								<a href="javascript: history.go(-1)" class="btn btn-danger"  name="cancelar" id="cancelar">OK</a>  
    							</div>
    						</div>
    					</div>
					</div>
    			<?php			
				
				}
			else 
				{
					$sqldatos="INSERT INTO datos_personales 
					(nombre,direccion,telefono1,telefono2,email1,documento) VALUES
					('$nombre','$direccion','$telefono1','$telefono2','$email','$documento')";
					mysqli_query($conexion,$sqldatos); 
  					$last_id = mysqli_insert_id($conexion);

                    
                   
 				 	if ($cliente =='1') 
 				 	{
                        $sqlcli="INSERT INTO clientes
 				 		(id_datos)
 				 		VALUES
 				 		($last_id)";
 				 		mysqli_query($conexion,$sqlcli);
 				 	    $last_id_clientes = mysqli_insert_id($conexion);

                        
                           
                            
 				 		
                         
                        $sqldatos_barco="INSERT INTO barcos (nombre_barco,tipo_barco,puerto_barco,comentario_barco,id_cliente)
                                             VALUES ('$nombrebarco','$tipobarco','$puertobarco','$comentbarco','$last_id_clientes')";
                        mysqli_query($conexion,$sqldatos_barco);
                           
                    }
 				 	if ($marinero =='1')
 				 	{
 				 		$sqlmar="INSERT INTO marineros
 				 		(id_datos)
 				 		VALUES
 				 		($last_id)";
 				 		mysqli_query($conexion,$sqlmar);
                        }
 				 	
 				 	if ($tecnico =='1')
 				 	{
 				 		$sqltec="INSERT INTO tecnicos
 				 		(id_datos)
 				 		VALUES
 				 		($last_id)";
 				 		mysqli_query($conexion,$sqltec);
 				 	}
		
      
//presento una caja con texto centrado y boton ok con hiperlink a inicio//

?>
<div class="row m-0 justify-content-center align-items-center vh-100">
	<div class="alert alert-primary" role="alert">
		<div class="row">
			<div class="col-sm-10">
    			<h1 class="text-uppercase" class="align-items-center"  >CONTACTO INGRESADO EN LA BASE DE DATOS</h1>
    		</div>
            <div class="col-sm-2">
    		    <form action="resultados_busqueda.php" method="POST">
    			    <input id="Nombre" name="Nombre"  type="hidden" value="<?php echo $nombre; ?>">
    		        <button class="btn btn-primary" name="buscar_nombre_btn" type="submit">OK</button>
                </form>
    		</div>
    	</div>
	</div>
</div>
<?php
 }
}
}
include("includes/footer.php"); ?>