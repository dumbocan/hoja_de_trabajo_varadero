<?php
include("includes/header.php"); ?>

<div class=" text-white">
  <div class="container mt-5" >
    <div class="row">
      <div class=col-md-3></div>
        <div class="col-md-5">
          <h2> Agregar elementos </h2>
          <form method="POST" action="confirmar_ingreso.php"> 
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
              <div class="form-group">
              	<div class="row">
              <div class="col-md-4">
              	<label>Propietario</label>

              </div>
              <div class="col-md-4">
              	<label>Marinero</label>
              </div>

              <div class="col-md-4">
              	<label>Trabajador</label>
              </div>
              </div>	  
          	</div>
              <div class="container mt-5">
                  
                <div class="row">
                <div class="col-md-7"> 	</div>	
                <div class="col-md-3"> 	
                	<button type="submit" class="btn btn-success p-2 " name="insertar_btn">Insertar</button>
            	</div>
            	<div class="col-md-2">

                	<a href="inicio3.php" class="btn btn-primary p-2 " name="buscar_btn">Buscar</a>
                </div>
                </div>  
              </div>  
            </div>
          </form> 
        </div>  
      </div>
    </div>    
  </div>
 








<?php include("includes/footer.php"); ?>