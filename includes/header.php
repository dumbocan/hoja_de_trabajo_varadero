<!DOCTYPE html>
<html lang="es">
<head>
<!-- codigo para poder tener caracteres en español y acentos -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- bootstrap -->
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>VARADERO</title>
</head>
<body>
 
<!--poner pagina color negro en css y letra blanca-->
<style>
   body 
   {
       background-color: black;
       background-image: url("images/imagen-base-de-datos.jpg");
       background-position: center center;
       background-repeat: no-repeat;
       background-attachment: fixed;
       background-size: cover;

   }
</style>

<!--BARRA DE NAVEGACION-->
<!--<nav class="navbar navbar-expand bg-dark navbar-dark fixed-top">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="navbar-brand" href="inicio3.php">Inicio</a> 
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="resultados_busqueda.php" >
            <input name="Nombre" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit" name="buscar_nombre_btn" aria-pressed="true">BUSCAR NOMBRE</button>
            <button class="btn btn-info" type="submit" name="buscar_barco_btn" aria-pressed="true">BUSCAR BARCO</button>
            <a href="ingresar_datos.php" class="btn btn-primary" role="button" aria-pressed="true">NUEVO</a>
        </form>
    </div>         
</nav>
   
<br />
<br />
<br />
<br />-->
  <nav class="navbar navbar-light bg-light bg-dark navbar-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="inicio3.php">Inicio</a>
    <form class="form-inline my-2 my-lg-0" method="POST" action="resultados_busqueda.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="nombre">
      <button class="btn btn-outline-success" type="submit" name="buscar_nombre_btn"> NOMBRE</button>
      <button class="btn btn-outline-info" type="submit" name="buscar_barco_btn"> BARCO</button>
      <a href="ingresar_datos.php" class="btn btn-outline-primary" role="button" >NUEVO</a>
    </form>
  </div>
</nav>


