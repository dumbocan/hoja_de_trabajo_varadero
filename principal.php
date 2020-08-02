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
  

</title>
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
if (isset($_POST['continuar_btn']))
   {
$nombre=$_POST['nombre'];
    echo "$nombre"."en principal";  
   } 

?>




<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
</body>
</html> 