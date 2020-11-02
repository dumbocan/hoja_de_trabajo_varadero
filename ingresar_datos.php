<?php
include("includes/header.php"); ?>

<br />
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
                <input type="number" class="form-control" name="telefono1" id="telefono1">  
              <label>Telefono 2</label>
                <input type="number" class="form-control" name="telefono2" id="telefono2">
              <label>Email</label>  
                <input type="email" class="form-control" name="email" id="email">  
              <label>Comentario</label>
                <input type="text" class="form-control" name="comentario" id="comentario">  
              <label>Documento</label>
                <input type="text" class="form-control" name="documento" id="documento">
            </div>
            <div class="container mt-4">
              <div class="form-group row">
                <div class="col-md-4">
                  <div class="form-group form-check">               
                    <input type="checkbox" class="form-check-input" id="cliente" name="cliente" value="1">
                    <label class="form-check-label" for="cliente-check">Cliente</label>
                  </div>
                </div>
           <!--     <div class="col-md-4">
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="marinero" name="marinero" value="1">
                    <label class="form-check-label" for="marinero-check">Marinero</label>
                  </div>
                </div>
            -->
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
                      <button type="submit" class="btn btn-success" name="ingresar_btn">Ingresar</button>
                    </div>
                    <div class="col-md-2">
                      <a href="inicio3.php" class="btn btn-primary" name="buscar_btn">Buscar</a>
                    </div>
                  </div>  
                </div>  
              </div>
            </form>
        </div>
     </div>       
  </div>       
   
        
  

<?php include("includes/footer.php"); ?>