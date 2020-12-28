<?php
include ("includes/header.php"); 
include ("conexbd.php");

  $id =$_POST['id'];  
  $_DELETE_SQL = "DELETE FROM datos_personales WHERE id_datos ='$id'";
              mysqli_query($conexion,$_DELETE_SQL);
?>

<div class="row m-0 justify-content-center align-items-center vh-100">
  <div class="alert alert-primary" role="alert">
    <div class="row">
      <div class="col ms-9"></div>
          <h1>CONTACTO ELIMINADO DE LA BASE DE DATOS</h1>
        
        <div class="col ms-3"></div>
        <a href="inicio3.php" class="btn btn-success my-1 my-sm-2"  type="button" class="btn btn-primary" >OK</a> 
        
      </div>
  </div>
</div>
<?php include ("includes/footer.php"); ?>