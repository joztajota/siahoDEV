<?php include( './../funciones/capa1.php');
$n_control=codificar($_REQUEST["ncontrol"]);
//echo $n_control."#".decodificar($n_control);
header('Location: ../vistas/aprobador.php?m_control='.$n_control);
exit;
?>
