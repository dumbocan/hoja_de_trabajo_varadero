<!DOCTYPE html>
<html>
<head>
 <!-- codigo para poder tener caracteres en español y acentos -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html lang="es">                                                                  <!-- bootstrap -->
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/bootstrap.min.css">

   <title>resultados</title>
   </head>
<body>
<!--poner pagina color negro en css y letra blanca-->
   <style>
      body {background-color: black;}
      color :{white};
   </style>
<!--condicional dependiendo de lo que se mande por POST desde inicio3-->
<div class=" text-white">

<?php 
include_once 'conexbd.php';
if (isset($_POST['buscar_btn']))
   {
      $nombre1=($_POST['Nombre']);
      $existe=0;
         if ($nombre1=="") 
            {
?>
<!--no deja insertar en blanco te da un error-->
<br>
<br>
<br>            
<br>  
<div class="container-md">
   <div class="container mt-5">
      <div class="alert alert-primary" role="alert">
         <div class="row">
            
            <div class="col md-2">
               <h1>Insertar texto.</h1>
            </div>
            <div class="col md-10">
               <div class="col text-right">
                  <a href="inicio3.php" class="btn btn-success" name="regresar_btn">Regresar</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--busca resultados en base de datos-->          
<?php
            }
            else
            {
               $resultados = mysqli_query($conexion,"SELECT * FROM datos_personales where nombre like '%$nombre1%'"); 
               while($consulta = mysqli_fetch_array($resultados)):

               $id= $consulta ['id_datos'];
               $nombre= $consulta ['nombre'];
               $direccion= $consulta ['direccion'];
               $telefono1= $consulta ['telefono1']; 
               $telefono2= $consulta ['telefono2'];
               $email= $consulta['email1'];
               $documento= $consulta['documento'];
               $comentario= $consulta['comentario'];

?> 
<br>
<br>
<br>
<div class="container-fluid">
   <form action="editar_datos.php" method="POST">
   <div class="bg-secondary text-white">
      <div class="row">


         <div class="col-sm-2">
            <div class="form-group row"> 
                  <label for="id" class="col-sm-5 col-form-label">NUMERO:</label>
                  <div class="col-sm-5">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="id" value="<?php echo $id ?>"
                     name="id"> 
                  </div>     
               </div>
            </div>

         
         <div class="col-sm-4">
            <div class="form-group row"> 
                  <label for="id" class="col-sm-2 col-form-label">NOMBRE:</label>
                  <div class="col-sm-8">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="nombre" value="<?php echo $nombre ?>"
                     name="nombre"> 
                  </div>     
               </div>
            </div>
         


         <div class="col-sm-6">
            <div class="form-group row"> 
                  <label for="id" class="col-sm-2 col-form-label">DIRECCION:</label>
                  <div class="col-sm-10">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="direccion" value="<?php echo $direccion ?>"
                     name="direccion"> 
                  </div>     
               </div>
            </div>
         </div>


      <div class="row">


         <div class="col-sm-2">
            <div class="form-group row"> 
                  <label for="telefono1" class="col-sm-4 col-form-label">TELEFONO:</label>
                  <div class="col-sm-8">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="telefono1" value="<?php echo $telefono1 ?>"
                     name="telefono1"> 
                  </div>     
               </div>
            </div>

            <div class="col-sm-2">
            <div class="form-group row"> 
                  <label for="telefono2" class="col-sm-4 col-form-label">TELEFONO:</label>
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


            <div class="col-sm-3">
            <div class="form-group row"> 
                  <label for="documento" class="col-sm-4 col-form-label">DOCUMENTO:</label>
                  <div class="col-sm-8">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="documento" value="<?php echo $documento ?>"
                     name="documento"> 
                  </div>     
               </div>
            </div>
         </div>

      <div class="row">
         

         <div class="col-sm-9">
            <div class="form-group row"> 
                  <label for="comentario" class="col-sm-2 col-form-label">COMENTARIO:</label>
                  <div class="col-sm-10">
                     <input type="text" style= "color: white" readonly class="form-control-plaintext" id="comentario" value="<?php echo $comentario ?>"
                     name="comentario"> 
                  </div>     
               </div>
            </div>
         


         <div class="col-sm-1">
            
            <button class="btn btn-warning" type="submit">Editar</button>
            </form>
         </div>
         <div class="col-sm-1">
            <form action="eliminar.php" method="POST">
               <input id="id" name="id" type="hidden" value="<?php echo $id; ?>">
                
               <input id="nombre" name="nombre" class="text-uppercase" type="hidden" value="<?php echo $nombre; ?>">       
               <button class="btn btn-danger" name="eliminar_btn" type="submit">Eliminar</button>
            </form>
         </div>
         <div class="col-sm-1">
            <form action="principal.php" method="POST">
               <input id="nombre" name="nombre" class="text-uppercase" type="hidden" value="<?php echo $nombre; ?>">   
               <button class="btn btn-primary" name="continuar_btn" type="submit">Continuar</button>
            </form>
         </div>           
      </div>
   </div> 
</div>
<?php
            $existe++; 
            endwhile; 
            if ($existe== 0)
            {
?> 
<!--avisa que el resultado no se encuentra en la base d datos  -->
<br>
<br>
<br>            
<br>                        
<div class="container-md">
   <div class="container mt-5">
      <div class="alert alert-primary" role="alert">
         <div class="row">

            <div class="col md-2">
               <h1> Lo siento<br> El documento no existe. </h1>
            </div>
            <div class="col md-10">
               <div class="col text-right">
                  <a href="inicio3.php" class="btn btn-success" name="regresar_btn">Regresar</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php 
            }
            }
   }
?>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
</body>
</html> 