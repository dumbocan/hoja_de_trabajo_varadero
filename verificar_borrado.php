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
<title>confirmacion eliminar</title>
</head>
<body>
<!--poner pagina color negro en css y letra blanca-->
   <style>
      body {background-color: black;}
      color :{white};
   </style>
<!--condicional dependiendo de lo que se mande por POST desde inicio3-->
<div class=" text-white">
<?php 
include_once 'conexbd.php';
$id=$_POST['id'];

$_DELETE_SQL = "DELETE FROM datos_personales WHERE id_datos ='$id'";
              mysqli_query($conexion,$_DELETE_SQL);
?>
<div class="row m-0 justify-content-center align-items-center vh-100">
	<div class="alert alert-primary" role="alert">
		<div class="row">
			<div class="col-sm-10">
    		<h1 class="text-uppercase" class="align-items-center"  >CONTACTO ELIMINADO DE LA BASE DE DATOS</h1>
    	</div>    			 
 			<div class="col-sm-2"> 
    		<a href="inicio3.php" type="button" class="btn btn-primary" >OK</a> 
    	</div>    	
    </div>
	</div>
</div>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
</body>
</html> 