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
<title>

   <title>inicio3</title>
   </head>
<body>

      
<!--poner pagina color negro en css y letra blanca-->
   <style>
      body {background-color: black;}
      color :{white};
   </style>
<!--preguntas y botones-->
<div class=" text-white">
   <div class="container mt-5">  
      <div class="row">
         <div class="col-md-3"></div>
            <div class="col-md-6">
               <h2> Busqueda datos </h2>
               <form method="POST" action="resultados_busqueda.php">
                  <div class="form-group">
                     <label><h3>Nombre cliente</h3></label>
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
   </div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
</body>
</html> 