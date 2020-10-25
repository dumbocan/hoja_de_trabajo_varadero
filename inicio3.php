<?php 
include("includes/header.php");

 ?>
<!--preguntas y botones-->

   <div class="container mt-5">  
      <div class="row">
         <div class="col-md-3"></div>
            <div class="col-md-6">
               <h2> Busqueda datos </h2>
               <form method="POST" action="resultados_busqueda.php">
                  <div class="form-group">
                     <h3>Introducir nombre</h3>
                     <input type="text" class="form-control" name="Nombre"> 
                        <div class="container mt-5">
                           <button type="submit" class="btn btn-success" name="buscar_btn">Buscar</button>
                           <a href="ingresar_datos.php" class="btn btn-primary" role="button" aria-pressed="true">Nuevo</a>
                        </div>
                  </div>      
               </form>        
            </div>
      </div>
   </div>
  


<?php include("includes/footer.php"); ?>