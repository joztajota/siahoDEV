<? session_start() ?>
<? ob_start(); ?>
<?php
//include('funciones/conexion.php');
//include('js/funciones.php');

function codificar($val2)
{
//$base64string = str_replace(array('=','+','/'),'',$base64string);
//$val2=decodificar2($val2);
$val=base64_encode($val2);

return $val;
}  
///////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////

function decodificar($val2)
{
//$base64string = str_replace(array('=','+','/'),'',$base64string);
$val=base64_decode($val2);

return $val;
}  

 ?>