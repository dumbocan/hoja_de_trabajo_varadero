
<?php

// llamo a la base de datos y recojo los valores que me manda por post ya cambiados y los actualiza en la base de datos//
include("includes/header.php");
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
              <h1 class="text-uppercase" class="align-items-center"  >añadicliente, marinero, o tecnico porfabor</h1>
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

// Si aprieto el boton insertar, meto todos los campos en la base de datos //
    $chcli=0;
    $existe =0;
    $id= $_POST['id'];
    $nombre= $_POST['nombre'];
    $direccion= $_POST['direccion'];
    $telefono1= $_POST['telefono1'];
    $telefono2= $_POST['telefono2'];
    $email= $_POST['email'];
    $documento=$_POST['documento'];
    $comentario=$_POST['comentario'];

    if(isset($_POST['insertar_btn']))
      {
        $update ="UPDATE datos_personales SET  
        nombre='$nombre',
        direccion='$direccion',
        telefono1='$telefono1',
        telefono2='$telefono2',
        email1='$email',
        comentario='$comentario',
        documento='$documento'
        WHERE 
        id_datos='$id'";
        mysqli_query($conexion,$update);
$idcli="0";
$idmar="0";
$idtec="0";
  echo $cliente;
  echo $marinero;
  echo $tecnico;
  echo $id;
        if ($cliente ==="1") 
          {

            $sqlcli="SELECT * FROM clientes where id_datos = '$id'";
            $resulcli = mysqli_query($conexion,$sqlcli); 
            while($cliente = mysqli_fetch_array($resulcli)) 
              {
                $idcli = $cliente ['id_datos'];
               
                echo $id;echo $idcli;var_dump($cliente);
                if ($idcli<>$id)
                  {
                    $sqlcli2 = "INSERT INTO clientes 
                    (id_datos)
                    VALUES
                    ($id)";
                    mysqli_query($conexion,$sqlcli2);    
                  }
              }
          }
        else
          {
            echo "borro";
            $sqlbocli="DELETE FROM clientes WHERE id_datos ='$id'";
            mysqli_query($conexion,$sqlbocli);     
          }    


        if ($marinero ==="1")
          {

            $sqlmar="SELECT * FROM marineros where id_datos = '$id'";
            $resulmar = mysqli_query($conexion,$sqlmar); 
            while($marinero = mysqli_fetch_array($resulmar)) 
              {
                $idmar = $marinero ['id_datos'];
               
                echo $id;echo $idmar;var_dump($marinero);
                if ($idmar<>$id)
                  {
                    $sqlcli2 = "INSERT INTO marineros 
                    (id_datos)
                    VALUES
                    ($id)";
                    mysqli_query($conexion,$sqlmar2);    
                  }
              }
          }
        else
          {
            $sqlbomar="DELETE FROM marineros WHERE id_datos ='$id'";
            mysqli_query($conexion,$sqlbomar);     
          }  

        if ($tecnico ==="1")
          {

            $sqltec="SELECT * FROM tecnicos where id_datos = '$id'";
            $resultec = mysqli_query($conexion,$sqltec); 
            while($tecnico = mysqli_fetch_array($resultec)) 
              {
                $idtec = $tecnico ['id_datos'];
               
                echo $id;echo $idtec;var_dump($tecnico);
                if ($idtec<>$id)
                  {
                    $sqltec2 = "INSERT INTO tecnicos 
                    (id_datos)
                    VALUES
                    ($id)";
                    mysqli_query($conexion,$sqltec2);    
                  }
              }
          }
        else 
          {
          $sqlbotec="DELETE FROM tecnicos WHERE id_datos ='$id'";
           mysqli_query($conexion,$sqlbotec);       
          }  

      }
           
?>

<div class="row m-0 justify-content-center align-items-center vh-100">
	<div class="alert alert-primary" role="alert">
		<div class="row">
			<div class="col-sm-10">
    			<h1 class="text-uppercase" class="align-items-center"  >EL CONTACTO SE HA ACTUALIZADO CON EXITO</h1>
    		</div>
    			 
 			 <div class="col-sm-2"> 
    			<a href="inicio3.php" type="button" class="btn btn-primary" >OK</a> 
    		</div>
    		
    	
    	</div>
	</div>
</div>
<?php 
}
include("includes/footer.php"); 
?>