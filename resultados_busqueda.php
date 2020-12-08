<?php
include 'includes/header.php';
include 'conexbd.php';
if (isset($_POST['buscar_btn'])) {
    $nombre1 = ($_POST['Nombre']);
    $existe = 0;
    if ($nombre1 == '') {
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
        ?>
        <br>
        <br>
       <p><center><h2>BUSQUEDA POR NOMBRE DE CLIENTE </h2></center> </p>
        <?PHP
        /*busca en base de datos de datos personales si hay algun nombre de cliente parecido al introducido*/
        $sqldatos = "SELECT * FROM datos_personales where nombre like '%$nombre1%'";
        $resultados = mysqli_query($conexion, $sqldatos);
        while ($consulta = mysqli_fetch_array($resultados)):
                    $rolcli = '';
        $rolmar = '';
        $roltec = '';
        $id = $consulta['id_datos'];
        $nombre = $consulta['nombre'];
        $direccion = $consulta['direccion'];
        $telefono1 = $consulta['telefono1'];
        $telefono2 = $consulta['telefono2'];
        $email = $consulta['email1'];
        $documento = $consulta['documento'];
        $comentariodatos1 = $consulta['comentario_datos'];
        
        ++$existe;
        //buscar datos en tablas clientes, marineros, tecnicos //
        $sqlcli = "SELECT * FROM clientes where id_datos = '$id'";
        $resulcli = mysqli_query($conexion, $sqlcli);
        while ($cliente = mysqli_fetch_array($resulcli)) {
            $idcli = $cliente['id_cliente'];
            if ($idcli) {
                $rolcli = 'Cliente';
            }
        }
        $sqlmar = "SELECT * FROM marineros where id_datos = '$id'";
        $resulmar = mysqli_query($conexion, $sqlmar);
        while ($marinero = mysqli_fetch_array($resulmar)) {
            $idmar = $marinero['id_marinero'];
            if ($idmar) {
                $rolmar = 'Marinero';
            }
        }
        $sqltec = "SELECT * FROM tecnicos where id_datos = '$id'";
        $resultec = mysqli_query($conexion, $sqltec);
        while ($tecnico = mysqli_fetch_array($resultec)) {
            $idtec = $tecnico['id_tecnico'];
            if ($idtec) {
                $roltec = 'Tecnico';
            }
        }

        /*busco en base de datos de barcos si hay algun barco con el nombre introducido */

        $sqldatosbarco2 = "SELECT * FROM datos_personales D   left JOIN clientes C    ON c.id_datos = D.id_datos
								                                         left JOIN barcos B    ON b.id_cliente = C.id_cliente
                                                                         WHERE nombre = '$nombre'";
        $sqldatosbarcoresul2 = mysqli_query($conexion, $sqldatosbarco2);
        while ($consultadatosbarcocli = mysqli_fetch_array($sqldatosbarcoresul2)) {
            $nombrebarco2 = $consultadatosbarcocli['nombre_barco'];
            $nombrecliente2 = $consultadatosbarcocli['nombre'];
            $tipobarco2 = $consultadatosbarcocli['tipo_barco'];
            $puertobarco2 = $consultadatosbarcocli['puerto_barco'];
            $comentbarco2 = $consultadatosbarcocli['comentario_barco'];
            $puertobarco2 = $consultadatosbarcocli['puerto_barco']; 
            $comentariocli1 = $consultadatosbarcocli['comentario_cliente'];
            $comentbarco2 = $consultadatosbarcocli['comentario_barco'];
            $idmarinero = $consultadatosbarcocli['id_marinero'];
            ?> 
<!--presento en pantalla los resultados de la busqueda-->
            <br>
            <div class="container-fluid">
                <div class="bg-secondary text-white">
                    <div class="border border-white">
                        <style type="text/css">
                            .transformacion2 { text-transform: uppercase;} 
                        </style>     
                        <center><h2><u class="transformacion2"><?php echo $nombre ?></u></h2></center>
                        <br /> 
<!--creo un formulario que me envia los datos a la pagina editar datos_2.php-->
                        <form action="editar_datos_2.php" method="post">   
			                <div class="row ">
                                <div class="col-sm-1 ml-2"><label>Nro:</label><?php echo ": ".$id;?></div>
				                <div class="col-sm-4"><label> NOMBRE </label><?php echo ":  ". $nombre; ?></div>
				                <div class="col-sm-4"> <label>DIRECCION </label><?php echo":  ". $direccion ?></div>			                    
				                <div class="col-sm "><label>TELEFONO</label> <?php echo":  ". $telefono1 ?></div>
			                </div>
                            <div class="row ml-1">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3"><label>TELEFONO 2</label><?php echo" :   ".$telefono2 ?></div>				 
				                <div class="col-sm-3"><label>EMAIL</label><?php echo" :   ".$email ?></div>
				                <div class="col-sm-3"><label>DOCUMENTO</label> <?php echo" :   ". $documento ?></div>
                                <div class="col-sm-1"><label>ROL</label><?php echo" :   ".$rolcli.'  '.$rolmar.'  '.$roltec; ?> </div>                                    
                            </div>

                            <!--
                            <div class="row ml-1">
                                <div class="col-sm-1"></div>
                                <div class="col-sm"><label>COMENTARIO DATOS PERSONALES</label><?php echo" :   ".$comentariodatos ?></div>
                            </div>
                            -->
                                
                            <div class="row ml-1">
                                <div class="col-sm-1"></div>
                                <div class="col-sm"><label>COMENTARIO CLIENTE</label><?php echo" :   ".$comentariocli1 ?></div>
                            </div>
                            <?php
/*Si el nombre encontrado es un marinero se muestran los barcos que tiene a cargo*/
                            if ($rolmar)
                                { ?>
                                    <div class="row ml-1">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm"><label>BARCO/S A CARGO</label>
                                        <br />
                                        <?php
 /*busqueda de barcos a cargo*/
                                        $consul_barcos = "SELECT * FROM marineros M INNER JOIN datos_personales D ON d.id_datos = M.id_marinero
							                                                    INNER JOIN barcos B on B.id_marinero = m.id_marinero 
                                                                                WHERE m.id_datos = '$id'";
                                        $consul_barcos2 = mysqli_query($conexion,$consul_barcos);
                                        while ($consul_barcos_loop= mysqli_fetch_array($consul_barcos2))
                                            {
                                            $barcomar = $consul_barcos_loop['nombre_barco'];
                                            echo $barcomar;
                                            }

                                        ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="row ml-1">
                                    <?php
/*si el cliente tiene barco se muestra la informacion del barco si no no sale*/
                                    if ($nombrebarco2)
                                        {?>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm"><label>NOMBRE EMBARCACION</label><?php echo" :   ".$nombrebarco2 ?></div>
                                            <div class="col-sm"><label>TIPO EMBARCACION</label><?php echo" :   ".$tipobarco2 ?></div>
                                            <div class="col-sm"><label>PUERTO EMBARCACION</label><?php echo" :   ".$puertobarco2 ?></div>

                                </div>
                                    <div class="row ml-1">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm"><label>COMENTARIO EMBARCACION</label><?php echo" :   ".$comentbarco2 ?></div>
                                
                                        <?php } ?>
                                    </div>
                                <div class="row">
                                    <div class="col-2 col-sm-5 col-lg-8"></div>
                                    <div class="col col-sm-2 col-lg-1">
<!--se mandan al formulario los valores id y el rol que tenga la persona en invisible-->
                                        <input id="id" name="id" type="hidden" value="<?php echo $id; ?>">
                                        <input id="rol" name="rol" type="hidden" value="<?php echo" :   ".$rolcli.'  '.$rolmar.'  '.$roltec; ?>">
                                        <button type="submit" name="editar" class="btn btn-warning">EDITAR</button>
                                    </div>
                                    <div class="col col-sm-2 col-lg-1">
                                        <button type="submit" name="eliminar" class="btn btn-danger">ELIMINAR</button>
                                    </div>
                                    <div class="col col-sm-2 col-lg-1">
                                        <button type="submit" name="continuar_btn" class="btn btn-primary">CONTINUAR</button>
                                    </div>                                   
                                </div>
                        </form>
                        <br />
                        

		            </div>
                </div>       
            </div>

    <!--                        <br>
                            <br>
                            <br>

                            <div class="container-fluid">
                               <div class="bg-secondary text-white">
                                    <form action="editar_datos.php" method="POST">                                
                                        <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group row"> 
                                                        <label for="id" class="col-sm-5 col-form-label">NUMERO:</label>
                                                        <div class="col-sm-5">
                                                            <input type="text" style= "color: white" readonly class="form-control-plaintext" id="id" value="<?php echo $id; ?>"name="id">                         
                                                        </div>     
                                                    </div>
                                                </div>        
                                                <div class="col-sm-4">
                                                   <div class="form-group row"> 
                                                        <label for="id" class="col-sm-2 col-form-label">NOMBRE:</label>
                                                        <div class="col-sm-8">
                                                             <input type="text" style= "color: white" readonly class="form-control-plaintext" id="nombre" value="<?php echo $nombre; ?>"
                                                             name="nombre"> 
                                                        </div>     
                                                   </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group row"> 
                                                        <label for="id" class="col-sm-2 col-form-label">DIRECCION:</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" style= "color: white" readonly class="form-control-plaintext" id="direccion" value="<?php echo $direccion; ?>"
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
                                                        <input type="text" style= "color: white" readonly class="form-control-plaintext" id="telefono1" value="<?php echo $telefono1; ?>"
                                                            name="telefono1"> 
                                                        </div>     
                                                    </div>
                                                </div>
                                              <div class="col-sm-2">
                                                    <div class="form-group row"> 
                                                        <label for="telefono2" class="col-sm-4 col-form-label">TELEFONO:</label>
                                                        <div class="col-sm-8">
                                                        <input type="text" style= "color: white" readonly class="form-control-plaintext" id="telefono2" value="<?php echo $telefono2; ?>"
                                                            name="telefono2"> 
                                                        </div>     
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group row"> 
                                                        <label for="email" class="col-sm-2 col-form-label">EMAIL:</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" style= "color: white" readonly class="form-control-plaintext" id="email" value="<?php echo $email; ?>"
                                                            name="email"> 
                                                        </div>     
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group row"> 
                                                        <label for="documento" class="col-sm-4 col-form-label">DOCUMENTO:</label>
                                                        <div class="col-sm-8">
                                                        <input type="text" style= "color: white" readonly class="form-control-plaintext" id="documento" value="<?php echo $documento; ?>"
                                                            name="documento"> 
                                                        </div>     
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group row"> 
                                                        <label for="rol" class="col-sm-4 col-form-label">ROL:</label>
                                                        <div class="col-sm-8">
                                                        <input type="text" style= "color: white" readonly class="form-control-plaintext" id="rol" value="<?php echo $rolcli.'  '.$rolmar.'  '.$roltec; ?>"
                                                            name="rol"> 
                                                        </div>     
                                                    </div>
                                                </div>
                                        </div>
                                        <!--
                                        <div class="row">        
                                                <div class="col-sm">
                                                    <div class="form-group row"> 
                                                        <label for="comentario" class="col-sm-3 col-form-label">COMENTARIO DATOS PERSONALES:</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" style= "color: white" readonly class="form-control-plaintext" id="comentario" value="<?php echo $comentariodatos1; ?>"
                                                            name="comentario"> 
                                                        </div>     
                                                    </div>
                                                </div>
                                        </div>
                                       

                                        <?php
                                        if($rolmar)
                                        {
                                        ?>


                                        <div class="row">        
                                                <div class="col-sm">
                                                    <div class="form-group row"> 
                                                        <label for="comentario" class="col-sm-3 col-form-label">BARCOS A CARGO:</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" style= "color: white" readonly class="form-control-plaintext" id="comentario" value="<?php echo $comentariocli1; ?>"
                                                            name="comentario"> 
                                                        </div>     
                                                    </div>
                                                </div>
                                        </div>


                                        <?php
                                        }

                                        else
                                        {

                                        ?>

                                        <div class="row">        
                                                <div class="col-sm">
                                                    <div class="form-group row"> 
                                                        <label for="comentario" class="col-sm-3 col-form-label">COMENTARIO DATOS CLIENTE:</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" style= "color: white" readonly class="form-control-plaintext" id="comentario" value="<?php echo $comentariocli1; ?>"
                                                            name="comentario"> 
                                                        </div>     
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group row">
                                                        <label for="nombre_barco" class="col-sm-6 col-form-label">NOMBRE EMBARCACION</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" style="color: white" readonly class="form-control-plaintext" id="nombre_barco" value=" <?php echo $nombrebarco2; ?>" name="nombre_barco" />
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            
                                                <div class="col-sm-4">
                                                   <div class="form-group row"> 
                                                        <label for="id" class="col-sm-5 col-form-label">TIPO DE EMBARCACION:</label>
                                                        <div class="col-sm-6">
                                                             <input type="text" style= "color: white" readonly class="form-control-plaintext" id="tipo_de_barco" value="<?php echo $tipobarco2; ?>"
                                                             name="tipo_de_barco"> 
                                                        </div>     
                                                   </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group row"> 
                                                        <label for="id" class="col-sm-5 col-form-label">PUERTO EMBARCACION:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" style= "color: white" readonly class="form-control-plaintext" id="puerto_barco" value="<?php echo $puertobarco2; ?>"
                                                            name="puerto_barco"> 
                                                        </div>     
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">        
                                            <div class="col-sm">
                                                <div class="form-group row"> 
                                                    <label for="comentario" class="col-sm col-form-label">COMENTARIO EMBARCACION:</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" style= "color: white" readonly class="form-control-plaintext" id="comentario" value="<?php echo $comentbarco2; ?>"
                                                            name="comentario"> 
                                                    </div>     
                                                </div>
                                            </div>
                                        </div>
                                         <?php
                                        }
                                         ?>
                                        <div class="row">
                                            <div class="col-sm-8"></div>
                                            <div class="col-sm-1">           
                                                 <button class="btn btn-warning" type="submit">Editar</button>
                                            </div>
                                    </form> 
                                            <form action="eliminar.php" method="POST">
                                                <div class="col-sm-1">
                                                   <input id="id" name="id" type="hidden" value="<?php echo $id; ?>">                            
                                                    <input id="nombre" name="nombre" class="text-uppercase" type="hidden" value="<?php echo $nombre; ?>">       
                                                    <button class="btn btn-danger" name="eliminar_btn" type="submit">Eliminar</button>                                                
                                                </div>
                                            </form>
                                            <form action="pres_datos_y_rol.php" method="POST">
                                               <div class="col-sm-1">                                                   
                                                   <input id="id" name="id" type="hidden" value="<?php echo $id; ?>"> 
                                                   <?php if ($rolmar || $rolcli) {?>                 
                                                   <button class="btn btn-primary" name="continuar_btn" type="submit">Continuar</button>
                                                   <?php } ?>
                                                </div>                                                   
                                            </form>
                                        </div> 
                                </div>
                            </div>
-->  
                            <?php
                            ++$existe;
        }
        endwhile;
        
        
         /*busca en la base de datos de barcos si el nombre introducido se parece a un nombre de barco*/ ?>
            <br>
            <br>
            
<p><center><h2>BUSQUEDA POR NOMBRE DE BARCO </h2></center> </p>
            
            <?php
            $idbarco = '';
        $sqlbarco = "SELECT * FROM barcos WHERE nombre_barco like '%$nombre1%'";
        $sqlbarcoresul = mysqli_query($conexion, $sqlbarco);
        while ($consultabarco = mysqli_fetch_array($sqlbarcoresul)) {
            $idbarco = $consultabarco['id_barco'];

            $sqldatosbarco = "SELECT * FROM barcos B INNER JOIN clientes C ON C.id_cliente = B.id_cliente
					               INNER JOIN datos_personales D     ON D.id_datos = C.id_datos
                                   WHERE id_barco = $idbarco";
            $sqldatosbarcoresul = mysqli_query($conexion, $sqldatosbarco);
            while ($consultadatosbarco = mysqli_fetch_assoc($sqldatosbarcoresul)) {
                $iddatos = $consultadatosbarco['id_datos'];
                $nombrebarco = $consultadatosbarco['nombre_barco'];
                $nombrecliente = $consultadatosbarco['nombre'];
                $tipobarco = $consultadatosbarco['tipo_barco'];
                
                $comentbarco = $consultadatosbarco['comentario_barco'];
                $puertobarco = $consultadatosbarco['puerto_barco'];
                $direccion = $consultadatosbarco['direccion'];
                $telefono1 = $consultadatosbarco['telefono1'];
                $telefono2 = $consultadatosbarco['telefono2'];
                $email = $consultadatosbarco['email1'];
                $documento = $consultadatosbarco['documento'];
                $comentariocli= $consultadatosbarco['comentario_cliente'];
                $comentariodatos= $consultadatosbarco['comentario_datos'];
                ?> 
                <br>
                    

                    <div class="container-fluid">
                        
                        <div class="bg-secondary text-white">
                            <div class="border border-white">
                            <style type="text/css">
                                .transformacion2 { text-transform: uppercase;} 
                            </style>     
                            <center><h2><u class="transformacion2"><?php echo $nombrebarco ?></u></h2></center>
                            <br />       
                            <form action="editar_datos_2.php" method="post">   
			                    <div class="row ">
                                    <div class="col-sm-1 ml-2"><label>Nro:</label><?php echo ": ".$iddatos;?></div>
				                    <div class="col-sm-4"><label> NOMBRE </label><?php echo ":  ". $nombrecliente; ?></div>
				                    <div class="col-sm-4"> <label>DIRECCION </label><?php echo":  ". $direccion ?></div>			                    
				                    <div class="col-sm "><label>TELEFONO</label> <?php echo":  ". $telefono1 ?></div>
			                    </div>
                                <div class="row ml-1">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label>TELEFONO 2</label><?php echo" :   ".$telefono2 ?></div>				 
				                    <div class="col-sm-3"><label>EMAIL</label><?php echo" :   ".$email ?></div>
				                    <div class="col-sm-3"><label>DOCUMENTO</label> <?php echo" :   ". $documento ?></div>
                                    <div class="col-sm-1"><label>ROL</label><?php echo" :   ".$rolcli.'  '.$rolmar.'  '.$roltec; ?> </div>                                    
                                </div>
                                <!--
                                <div class="row ml-1">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm"><label>COMENTARIO DATOS PERSONALES</label><?php echo" :   ".$comentariodatos ?></div>
                                </div>
                                -->
                                <div class="row ml-1">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm"><label>COMENTARIO CLIENTE</label><?php echo" :   ".$comentariocli ?></div>
                                </div>
                                <div class="row ml-1">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm"><label>NOMBRE EMBARCACION</label><?php echo" :   ".$nombrebarco ?></div>
                                    <div class="col-sm"><label>TIPO EMBARCACION</label><?php echo" :   ".$tipobarco ?></div>
                                    <div class="col-sm"><label>PUERTO EMBARCACION</label><?php echo" :   ".$puertobarco ?></div>

                                </div>
                                <div class="row ml-1">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm"><label>COMENTARIO EMBARCACION</label><?php echo" :   ".$comentbarco ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-2 col-sm-5 col-lg-8"></div>
                                    <div class="col col-sm-2 col-lg-1">
                                        <input id="id" name="id" type="hidden" value="<?php echo $iddatos; ?>">
                                        <input id="rol" name="rol" type="hidden" value="<?php echo" :   ".$rolcli.'  '.$rolmar.'  '.$roltec; ?>">
                                        <button type="submit" name="editar" class="btn btn-warning">EDITAR</button>
                                    </div>
                                    <div class="col col-sm-2 col-lg-1">
                                        <button type="submit" name="eliminar" class="btn btn-danger">ELIMINAR</button>
                                    </div>
                                    <div class="col col-sm-2 col-lg-1">
                                        <button type="button" class="btn btn-primary">CONTINUAR</button>
                                    </div>                                   
                                </div>
                            </form>
                                <br />
                        

		                    </div>
                        </div>
                        
                    </div>
                <?php

                ++$existe;
            }
        }


        if ($existe == 0) {
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
include 'includes/footer.php';
?>