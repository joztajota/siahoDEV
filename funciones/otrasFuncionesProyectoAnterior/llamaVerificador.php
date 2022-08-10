<?php include( './../funciones/capa1.php');
$n_control=codificar($_REQUEST["ncontrol"]);
header('Location: ../vistas/verificador.php?m_control='.$n_control);
exit;
?>
