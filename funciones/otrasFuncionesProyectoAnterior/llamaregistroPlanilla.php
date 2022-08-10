<?php 
include_once( './../funciones/capa1.php');
$n_control=codificar($_REQUEST["ncontrol"]);
//echo $n_control." es: ".decodificar($n_control);
header('Location: ../vistas/registroPlanilla.php?m_control='.$n_control);
exit;
?>
