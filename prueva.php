<label>Marinero</label>
                			
                			<select class="custom-select" id="inputGroupSelect02">
                				<option selected>Choose...</option>
                			<?php
                			$buscamar="SELECT nombre D FROM datos_personales D INNER JOIN marineros M ON D.id_datos = M.id_datos";

                			$buscanommar=mysqli_query($conexion,$buscamar);
                			print_r($buscanommar);
                			while ($datos=mysqli_fetch_array($buscanommar)):
                			 
                			 	$nombre= $datos ['nombre'];
                			 	
                			 	echo $nombre;
                			 	?>
                			    <option value="1"><?php echo $nombre;    ?></option>

                			    <?php 
                			endwhile;
                			?>
                			
    							
    							
    							
  							</select>
  						</div>
                			<input id="id" name="id"  type="hidden" value="<?php echo $id; ?>">