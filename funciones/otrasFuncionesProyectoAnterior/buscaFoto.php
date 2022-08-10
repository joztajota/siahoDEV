<?php    
include_once( 'conecciones/adodb/controlador.php' );
$db = controlador(1);
//$ci=15258628;
$ci_b=$_REQUEST[ 'ci_b' ];
$sql="SELECT top 1
dbo.UDFEMP.FLT_CEDULA,
dbo.MMOBJS.LNL_BLOB
FROM
dbo.UDFEMP
INNER JOIN dbo.MMOBJS ON dbo.MMOBJS.EMPID = dbo.UDFEMP.ID
WHERE
dbo.UDFEMP.FLT_CEDULA = $ci_b
";

$result = $db->execute($sql);
$tatotal = $result->numRows ();
$foto_carnet= $result->fields['LNL_BLOB'];
$ced_carnet= $result->fields['FLT_CEDULA'];
if ($tatotal<1){
  $db = controlador(2); 
  $result = $db->execute($sql);
  $tatotal = $result->numRows ();
  $foto_carnet= $result->fields['LNL_BLOB'];    
    
}
if ($tatotal<1){
  $db = controlador(3); 
  $result = $db->execute($sql);
  $tatotal = $result->numRows ();
  $foto_carnet= $result->fields['LNL_BLOB'];    
    
}
if ($tatotal<1){
    
     echo '<img style="position: relative; center: 0px; top: 0px; width: 90%; height: 130px;" src="../icon/silueta.JPG"/>';

      
}
if ($tatotal>0){
    echo'<img style="position: relative; center: 0px; top: 0px; width: 90%; height: 130px;" src="data:image/jpeg;base64,'.base64_encode($foto_carnet).'"/>';
}
?>