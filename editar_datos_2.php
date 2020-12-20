<?php 
include("includes/header.php");
include 'conexbd.php';
 ?>
<br />
<br />
<br />

<?php
if(isset($_POST['editar']))
    {
    $id_datos = ($_POST['id']);
    $rol =($_POST['rol']);
    $nombre_marinero=($_POST['nombre_marinero']);


    $sql_datos="SELECT * FROM datos_personales D    LEFT JOIN clientes C ON c.id_datos = D.id_datos 
                                                LEFT JOIN barcos B ON b.id_cliente = C.id_cliente
                                                WHERE D.id_datos = $id_datos";
    $res_sql_datos = mysqli_query($conexion, $sql_datos);
    while ($consulta = mysqli_fetch_array($res_sql_datos))
        {
        $nombre = $consulta['nombre'];
        $direccion = $consulta['direccion'];
        $telefono1 = $consulta['telefono1'];
        $telefono2 = $consulta['telefono2'];
        $email = $consulta['email1'];
        $documento = $consulta['documento'];

        $nombrebarco =  $consulta['nombre_barco'];
        $tipobarco =  $consulta['tipo_barco'];
        $comentbarco =  $consulta['comentario_barco'];
        $puertobarco =  $consulta['puerto_barco']; 
        $comentariocli =  $consulta['comentario_cliente'];

        ?>

        <!-- composicion del formulario para editar los datos del monbre buscado-->

        <div class="container-fluid">
            <form method="POST" action="confirmar_edicion.php"> 
                <div class="bg-secondary text-white">
                    <div class="border border-white">
                        <br />
                        <div class="row">
                            <div class="col-sm-4 ml-5">
                                
                                    <input  style= "color: white" readonly class="form-control-plaintext" id="id" value="<?php echo "Nro: ".$id_datos; ?>"
                                    name="id"> 
                            </div>
                                <div class="col-md-3">
                                    <input type="text" value="<?php echo $nombrebarco ?>" class="form-control" name="nombrebarco" id="nombrebaco">               
                                </div>
                        </div>      
			            <div class="row ">
                        <div class="col-md-1"></div>    
                            
				            <div class="col-sm-4">
                                <label> NOMBRE </label>
                                    <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre" > 
                            </div>
				            <div class="col-sm-4">
                                <label>DIRECCION </label>
                                    <input type="text" value="<?php echo $direccion; ?>" class="form-control" name="direccion" id="direccion" > 
                            </div>			                    
				            <div class="col-sm mr-4">
                                <label>TELEFONO</label>
                                <input type="tel" value="<?php echo $telefono1; ?>" class="form-control" name="telefono1" id="telefono1">
                            </div>
			            </div>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-3">
                                <label>TELEFONO 2</label>   
                                <input type="tel" value="<?php echo $telefono2; ?>" class="form-control" name="telefono2" id="telefono2">
                            </div>				 
				            <div class="col-sm-3">
                                <label>EMAIL</label>
                                <input type="email" value="<?php echo $email; ?>" class="form-control" name="email" id="email">
                            </div>
				            <div class="col-sm-3">  
                                <label>DOCUMENTO</label>
                                <input type="text" value="<?php echo $documento; ?>" class="form-control" name="documento" id="documento">
                            </div>
                        </div>       
                                    <?php
                                    
/* se dan valores a checkbox*/
                                    $rolcli = 0;
                                    $rolmar = 0;
                                    $roltec = 0;

                                    if (strpos($rol, 'Cliente') !== false)  
                                    {
                                        $rolcli = 'checked';
                                    }

                                    if (strpos($rol, 'Marinero') !== false) 
                                    {
                                        $rolmar = 'checked';
                                    }

                                    if (strpos($rol, 'Tecnico') !== false) 
                                    {
                                        $roltec = 'checked';
                                    }


                                    ?>       

                                    <!--pintar y dar valor a celdas de check box.  --> 

                                    <div class="container mt-4">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <div class="form-group form-check">               
                                                    <input type="checkbox" class="form-check-input" id="cliente" name="cliente" value="1" <?php echo $rolcli; ?>>
                                                    <label class="form-check-label" for="cliente-check">Cliente</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="marinero" name="marinero" value="1" <?php echo $rolmar; ?>>
                                                    <label class="form-check-label" for="marinero-check">Marinero</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="tecnico"  name="tecnico" value="1" <?php echo $roltec; ?>>
                                                    <label class="form-check-label" for="tecnico-check">Tecnico</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               

                                
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm mr-4">
                                        <label>COMENTARIO CLIENTE</label>
                                        <input type="text" value="<?php echo $comentariocli; ?>" class="form-control" name="comentariocli" id="comentariocli">  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm">
                                        <label>NOMBRE EMBARCACION</label>
                                        <input type="text" value="<?php echo $nombrebarco; ?>" class="form-control" name="nombrebarco" id="nombrebarco">  
                                    </div>
                                    <div class="col-sm">
                                        <label>TIPO EMBARCACION</label>
                                        <input type="text" value="<?php echo $tipobarco; ?>" class="form-control" name="tipobarco" id="tipobarco">
                                    </div>
                                    <div class="col-sm mr-4">    
                                        <label>PUERTO EMBARCACION</label>
                                        <input type="text" value="<?php echo $puertobarco; ?>" class="form-control" name="puertobarco" id="puertobarco">
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm mr-4">
                                        <label>COMENTARIO EMBARCACION</label>
                                        <input type="text" value="<?php echo $comentbarco; ?>" class="form-control" name="comentbarco" id="comentbarco">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-3">
                                            <label>MARINERO</label>
                					        <select class="custom-select" name="nombre_marinero" id="nombre_marinero" >
                                                <option ><?php echo $nombre_marinero?></option>
                						        <option value=" ">Ninguno</option>
										        <option value="1">Nuevo marinero</option>
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
                                        <div class="col-md-6"></div>
                                        <div class="col-md-2 mt-5">  
                                            <button  type="submit" class="btn btn-success" name="insertar_btn">CAMBIAR NUEVOS DATOS</button>
                                        </div>
                                    </div>
                                </div>
                                <br />
                    </div>
                </div>
            </form>
        </div>

                       <?php
                      
        }

    }
else 
    {
        if(isset($_POST['eliminar']));
        echo "eliminar";
    }
?>

<?php include("includes/footer.php"); ?>