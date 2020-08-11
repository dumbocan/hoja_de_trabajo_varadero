<?php
include("includes/header.php"); ?>
<div class="container">
    <h1>Comprobar valor del checkbox con PHP</h1>
    <h2 class="lead">Envia el formulario</h2>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="https://www.jose-aguilar.com/blog/">Blog</a></li>
          <li class="breadcrumb-item"><a href="#">Base Bootstrap</a></li>
          <li class="breadcrumb-item active">Base Bootstrap Demo</li>
        </ol>
    </nav>
  
<div class="row">
        <div id="content" class="col-lg-12">
                        <form action="index.php" method="post">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="conditions" name="conditions" value="1">
                    <label class="form-check-label" for="exampleCheck1">Aceptar condiciones de uso</label>
                </div>
                <input type="submit" class="btn btn-primary" name="sendForm" value="Enviar"/>
            </form>
        </div>
    </div>
 </div>
<?php include("includes/footer.php"); ?>