
<?php

// llamo a la base de datos y recojo los valores que me manda por post ya cambiados y los actualiza en la base de datos//
include("includes/header.php");
include ("conexbd.php");

//recoje los valores de las casillas check//
$cliente=0;
$marinero=0;
$tecnico=0;

if(isset($_POST['cliente']) && $_POST['cliente'] == 1)
  {$cliente=1;}

if(isset($_POST['marinero']) && $_POST['marinero'] == 1)
  {$marinero=1;}

if(isset($_POST['tecnico']) && $_POST['tecnico'] == 1)
  {$tecnico=1;}

// si ninguna de las casillas check se han clicado te da error//
if ($cliente + $marinero + $tecnico == '0' )
 {
    ?>
      <div class="row m-0 justify-content-center align-items-center vh-100">
        <div class="alert alert-primary" role="alert">
          <div class="row">
            <div class="col-sm-10">
              <h1 class="text-uppercase" class="align-items-center"  >Añadir cliente, marinero, o tecnico.</h1>
                </div>
         
              <div class="col-sm-2"> 
                <a href="javascript: history.go(-1)" class="btn btn-danger"name="cancelar" id="cancelar">OK</a>  
              </div>
            </div>
          </div>
      </div>
    <?php       
  }

else 
  {

// recojo los valores del formulario para insertar nuevos datos //
    $chcli=0;
    $existe =0;
    $id=$_POST['id'];
    $nombre= $_POST['nombre'];
    $direccion= $_POST['direccion'];
    $telefono1= $_POST['telefono1'];
    $telefono2= $_POST['telefono2'];
    $email= $_POST['email'];
    $documento=$_POST['documento'];
    $comentariocli=$_POST['comentariocli'];
    $nombrebarco=$_POST['nombrebarco'];
    $tipobarco=$_POST['tipobarco'];
    $puertobarco=$_POST['puertobarco'];
    $comentbarco=$_POST['comentbarco'];
    $nombre_marinero=$_POST['nombre_marinero'];



// si doy al boton insertar_btn procedo a cambiar datos//
    if(isset($_POST['insertar_btn']))
      {
        $update ="UPDATE datos_personales SET  
                  nombre='$nombre',
                  direccion='$direccion',
                  telefono1='$telefono1',
                  telefono2='$telefono2',
                  email1='$email',       
                  documento='$documento'
                  WHERE 
                  id_datos='$id'";
        mysqli_query($conexion,$update);
        

        $update_cli ="UPDATE clientes SET  
                      comentario_cliente ='$comentariocli'        
                      WHERE 
                      id_datos='$id'";
        mysqli_query($conexion,$update_cli);
//busco el id_barco del barco que pertenece al cliente
        $buscar_barco="SELECT * FROM clientes C INNER JOIN barcos B ON C.id_cliente = B.id_cliente WHERE C.id_datos = '$id'";
        $sql_barco=mysqli_query($conexion,$buscar_barco);
        while ($sql_buscar=mysqli_fetch_array($sql_barco))
        {
        $id_barco=$sql_buscar['id_barco'];
        
//al no ingresar marinero o quitar marinero a un barco lo borra de la base de datos//
            if ($nombre_marinero == "0")
                {$nombre_marinero = 'NULL';}               
            $update_barco = "UPDATE barcos SET
                        nombre_barco ='$nombrebarco',
                        tipo_barco ='$tipobarco',
                        puerto_barco ='$puertobarco',
                        comentario_barco ='$comentbarco',                      
                        id_marinero = $nombre_marinero  
                        WHERE
                        id_barco ='$id_barco'";
            mysqli_query($conexion,$update_barco);
            print_r($update_barco);
        }              

/* se comprueba que los checkbox que se han introducido existen ya o no para no duplicar valores en la base de datos
 y si se desmarcaron los checkbox borrar el dato de la base de datos.*/
$idcli=0;
$idmar=0;
$idtec=0;
$contcli=0;
$contmar=0;
$conttec=0;
 //si checkbox esta clicada comprueba si ya existe por id
        if ($cliente == 1) 
          {
            $sqlcli="SELECT * FROM clientes where id_datos = '$id'";
            $resulcli = mysqli_query($conexion,$sqlcli); 
            while($cliente = mysqli_fetch_array($resulcli)) 
              {
                $idcli = $cliente ['id_datos'];
                $contcli ++;
               } 
// si no existe inserta dato id              
                if ($contcli == 0) 
                  {
                    $sqlcli2 = "INSERT INTO clientes 
                    (id_datos)
                    VALUES
                    ($id)";
                    mysqli_query($conexion,$sqlcli2);    
                  }
          }
// si checkbox no esta clicada borro id de base de datos
        else  
          {
            $sqlbocli="DELETE FROM clientes WHERE id_datos ='$id'";
            mysqli_query($conexion,$sqlbocli);     
          }    
//si checkbox esta clicada comprueba si ya existe por id
        if ($marinero ==1)
          {
            $sqlmar="SELECT * FROM marineros where id_datos = '$id'";
            $resulmar = mysqli_query($conexion,$sqlmar); 
            while($marinero = mysqli_fetch_array($resulmar)) 
              {
                $idmar = $marinero ['id_datos'];
                $contmar ++;
              } 
// si no existe inserta dato id
                if ($contmar == 0)
                  {
                    $sqlmar2 = "INSERT INTO marineros 
                    (id_datos)
                    VALUES
                    ($id)";
                    mysqli_query($conexion,$sqlmar2);    
                  }              
          }
 // si checkbox no esta clicada borro id de base de datos
        else
          {
            $sqlbomar="DELETE FROM marineros WHERE id_datos ='$id'";
            mysqli_query($conexion,$sqlbomar);     
          }  
//si checkbox esta clicada comprueba si ya existe por id

        if ($tecnico ==1)
          {
            $sqltec="SELECT * FROM tecnicos where id_datos = '$id'";
            $resultec = mysqli_query($conexion,$sqltec); 
            while($tecnico = mysqli_fetch_array($resultec)) 
              {
                $idtec = $tecnico ['id_datos'];
                $conttec ++;
              }             
// si no existe inserta dato id

                if ($conttec == 0)
                  {
                    $sqltec2 = "INSERT INTO tecnicos 
                    (id_datos)
                    VALUES
                    ($id)";
                    mysqli_query($conexion,$sqltec2);    
                  }              
          }
 // si checkbox no esta clicada borro id de base de datos
        else 
          {
          $sqlbotec="DELETE FROM tecnicos WHERE id_datos ='$id'";
           mysqli_query($conexion,$sqlbotec);       
          }  
      }
           
?>
<!--pinta una advewrtencia que se ha actualizado con exito-->
<div class="row m-0 justify-content-center align-items-center vh-100">
	<div class="alert alert-primary" role="alert">
		<div class="row">
			<div class="col-sm-11">
    			<h1 class="text-uppercase" class="align-items-center"  >CONTACTO SE HA ACTUALIZADO CON EXITO</h1>
    		</div>
            <div class="col-sm-1">
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
include("includes/footer.php"); 
?>