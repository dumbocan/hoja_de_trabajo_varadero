
<?php
include 'includes/header.php';
include 'conexbd.php';
 ?>
<br />
<br />
<br />

<div class="container-fluid">
    <form method="POST" action="confirmar_ingreso.php"> 
        <div class="bg-secondary text-white">
            <div class="border border-white">
                <br />
                <div class="row ">                                   
				    <div class="col-sm mr-4 ml-4">
                         <label> NOMBRE </label>
                         <input type="text"  class="form-control" name="nombre" id="nombre" > 
                    </div>
				    <div class="col-sm mr-4 ml-4">
                         <label>DIRECCION </label>
                         <input type="text"  class="form-control" name="direccion" id="direccion" > 
                    </div>			                    
				    <div class="col-sm mr-4 ml-4">
                         <label>TELEFONO</label>
                         <input type="tel"  class="form-control" name="telefono1" id="telefono1">
                    </div>
			    </div>
                <div class="row">                                   
                    <div class="col-sm ml-4 mr-4">
                         <label>TELEFONO 2</label>   
                         <input type="tel"  class="form-control" name="telefono2" id="telefono2">
                    </div>				 
				    <div class="col-sm mr-4 ml-4">
                       <label>EMAIL</label>
                       <input type="email"  class="form-control" name="email" id="email">
                    </div>
				    <div class="col-sm mr-4 ml-4">  
                         <label>DOCUMENTO</label>
                         <input type="text"  class="form-control" name="documento" id="documento">
                    </div>
                </div>                  
                                    <!--pintar  celdas de check box.  --> 

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
                            </div>                            </div>
                    </div>
                </div>
                <div class="row">               
                    <div class="col-sm ml-4 mr-4">
                         <label>COMENTARIO CLIENTE</label>
                         <input type="text"  class="form-control" name="comentariocli" id="comentariocli">  
                    </div>
                </div>
                <div class="row">               
                    <div class="col-sm ml-4 mr-4">
                        <label>NOMBRE EMBARCACION</label>
                        <input type="text"  class="form-control" name="nombrebarco" id="nombrebarco">  
                    </div>
                    <div class="col-sm ml-4 mr-4">
                        <label>TIPO EMBARCACION</label>
                        <input type="text"  class="form-control" name="tipobarco" id="tipobarco">
                    </div>
                    <div class="col-sm ml-4 mr-4">    
                        <label>PUERTO EMBARCACION</label>
                        <input type="text"  class="form-control" name="puertobarco" id="puertobarco">
                    </div>          
                </div>
                <div class="row">        
                    <div class="col-sm mr-4 ml-4">
                        <label>COMENTARIO EMBARCACION</label>
                        <input type="text"  class="form-control" name="comentbarco" id="comentbarco">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 mr-4 ml-4">
                        <label>MARINERO</label>
                					<select class="custom-select" name="nombre_marinero" id="nombre_marinero">

                						<option value="0">Ninguno</option>
										
										
                						<?php
                						$buscamar="SELECT * FROM datos_personales D INNER JOIN marineros M ON D.id_datos = M.id_datos";
                						$buscanommar=mysqli_query($conexion,$buscamar);                			
                						while ($datos=mysqli_fetch_array($buscanommar)):
                						$nombre_marinero=$datos['nombre'];
                                        $id_marinero=$datos['id_marinero'];
                			 			?>
                						<option value="<?php echo $id_marinero;?>"><?php echo $nombre_marinero;?></option>
                						<?php 
                						endwhile;
                						?>
                					</select>

                    </div>
                </div>
               
                <div class="container mt-2">
                   <div class="form-group">  
                        <div class="row">
                            <div class="col-md-11">  </div>  
                                <div class="col-md-1">  
                                    <button type="submit" class="btn btn-success" name="ingresar_btn">INGRESAR</button>
                                </div>
                        </div>  
                   </div>  
                </div>
            </div>
        </div>
    </form>
</div>

<?php include("includes/footer.php"); ?>