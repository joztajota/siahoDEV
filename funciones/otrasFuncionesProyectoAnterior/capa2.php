<? session_start() ?>
<? ob_start(); ?>
<?php
function codificar2($val2)

{
include('variables.php');
	$valor="";
	$i=0;
	$j=$i;
	
	for ($i = 0; $i < strlen($val2); $i++) {
		if($j>strlen($clave)){
			$j=0;
		}
	$temp1=ord(substr($val2,$i,1));
	$temp2=ord(substr($clave,$j,1));	
	
	$temp3=$temp1+$temp2;
	
	$val3=chr($temp3);
	
	$valor=$valor.$val3;
	$j=$j+1;
		
	
}//cierra for de la comp del valor2
return $valor;
}  
///////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////

function decodificar2($val2)
{
include('variables.php');
	$valor="";
	$i=0;
	$j=$i;
	for ($i = 0; $i < strlen($val2); $i++) {
		if($j>strlen($clave)){
			$j=0;
		}
	$temp1=ord(substr($val2,$i,1));
	$temp2=ord(substr($clave,$j,1));	
	
	$temp3=$temp1-$temp2;
	
	$val3=chr($temp3);
	
	$valor=$valor.$val3;
	$j=$j+1;
		
	
}//cierra for de la comp del valor2
return $valor;
}  

 ?>