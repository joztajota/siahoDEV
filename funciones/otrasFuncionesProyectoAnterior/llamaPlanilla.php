<?php 

$labor_codigo=$_REQUEST["labor_codigo"];
header('Location: ../vistas/reportes/verplanilla.php?bandera=2&labor_codigo='.$labor_codigo);
exit;
?>
