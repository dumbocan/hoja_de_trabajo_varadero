<?php
include("includes/header.php"); ?>
<?php
$data = array("clave1" => "nuevo", "clave2" => "usado", "clave3" => "medio");
foreach($data as $key => $value)
{
    echo "<input type='checkbox' name='vehicle1' value='<?php echo '".$value."'> ".$value ;
}
?>
<?php include("includes/footer.php"); ?>