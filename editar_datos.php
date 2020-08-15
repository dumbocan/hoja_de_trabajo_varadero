
<?php
include ("includes/header.php");
include ("conexbd.php");

// inicio base de datos y les doy datos a los campos de valor ateriormente buscado// 
$existe =0;
$id= $_POST['id'];
$nombre= $_POST['nombre'];
$direccion= $_POST['direccion'];
$telefono1= $_POST['telefono1'];
$telefono2= $_POST['telefono2'];
$email= $_POST['email'];
$documento=$_POST['documento'];
$comentario=$_POST['comentario'];

               
?>       

<!-- composicion del formulario para editar los datos del monbre buscado-->

<div class=" text-white">
  <div class="container mt-5" >
    <div class="row">
      <div class=col-md-3></div>
        <div class="col-md-5">
          <h2> Agregar elementos </h2>

<!-- Mando todos los datos por post a la pagina confirmar edicion-->

          <form method="POST" action="confirmar_edicion.php"> 
            <div class="form-group">               
                <input type="int" style= "color: white" readonly class="form-control-plaintext" id="id" value="<?php echo $id ?>"
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
                <input type="text" value="<?php echo $comentario; ?>" class="form-control" name="comentario" id="comentario">  
              <label>Documento</label>
                <input type="text" value="<?php echo $documento; ?>" class="form-control" name="documento" id="documento">
               <div class="container mt-4">
              <div class="form-group row">
                <div class="col-md-4">
                  <div class="form-group form-check">               
                    <input type="checkbox" class="form-check-input" id="cliente" name="cliente" value="1">
                    <label class="form-check-label" for="cliente-check">Cliente</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="marinero" name="marinero" value="1">
                    <label class="form-check-label" for="marinero-check">Marinero</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="tecnico"  name="tecnico" value="1">
                    <label class="form-check-label" for="tecnico-check">Tecnico</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="container mt-5">
              <div class="form-group">  
                <div class="row">
                  <div class="col-md-7">  </div>  
                    <div class="col-md-3">  
                      <button type="submit" class="btn btn-success" name="insertar_btn">Insertar</button>
                    </div>
                    <div class="col-md-2">
                      <a href="inicio3.php" class="btn btn-primary" name="buscar_btn">Buscar</a>   
              </div>  
            </div>
          </form> 
        </div>  
      </div>
    </div>
  </div>
 
<?php include("includes/footer.php"); ?>