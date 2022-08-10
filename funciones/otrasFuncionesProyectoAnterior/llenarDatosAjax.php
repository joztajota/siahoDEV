<?php
if ( !isset( $_SESSION ) ) {
  session_start();
}
include_once( 'conecciones/MariaDB/connsisgm.php' );
$conexion=dbcon();
$bandera = $_REQUEST[ 'accion1' ];
$usuario_sistema=$_SESSION['id_user'];
$fecha = date('Y-m-d');
//$bandera ='llenar_combo_area'; 
if ( $bandera == 'llenar_combo_municipio' ) {
    //echo $bandera ;
  $parte2 = "<option value='0' selected='selected' >Seleccione un Municipio </option>";
  $id_estado =  $_REQUEST[ 'id_estado' ];
    //$ger_usu = 20;
  $select = '';
  $sql = "select * from tbl_municipios WHERE id_estado=$id_estado "; //echo $sql."<br/>";    
  $result_combo = mysqli_query( $conexion, $sql );
  while($rowc = mysqli_fetch_array($result_combo)){
    $prId = $rowc['id_municipio'];
    $prName = $rowc['municipio'];
    $parte3 = '<option value="' . $prId . '"' . $select . '>' . $prName . '</option>';
    $parte2 = $parte2 . $parte3;
  }
  echo $parte2;
}

if ( $bandera == 'llenar_combo_parroquia' ) {
  //echo $bandera ;
$parte2 = "<option value='0' selected='selected' >Seleccione su Parroquia </option>";
$id_municipio =  $_REQUEST[ 'id_municipio' ];
  //$ger_usu = 20;
$select = '';
$sql = "select * from tbl_parroquias WHERE id_municipio=$id_municipio "; //echo $sql."<br/>";    
$result_combo = mysqli_query( $conexion, $sql );
while($rowc = mysqli_fetch_array($result_combo)){
  $prId = $rowc['id_parroquia'];
  $prName = $rowc['parroquia'];
  $parte3 = '<option value="' . $prId . '"' . $select . '>' . $prName . '</option>';
  $parte2 = $parte2 . $parte3;
}
echo $parte2;
}

if ( $bandera == 'llenar_combo_clasificacion' ) {
  $Clasificacion="";
  $id_clasificacion =  $_REQUEST[ 'id_clasificacion' ];
  $sql = "select * from tbl_clasificacion WHERE id_clasificacion=$id_clasificacion "; //echo $sql."<br/>";    
  $result_combo = mysqli_query( $conexion, $sql );
  while($rowc = mysqli_fetch_array($result_combo)){
    $Clasificacion = $rowc['Clasificacion'];
  }
  echo $Clasificacion;
  }

if ( $bandera == 'llenar_combo_area' ) {
  $parte2 = "<option value='0' selected='selected' >Seleccione una Area </option>";
  $ger_usu =  $_REQUEST[ 'ger_usu' ];
  $select = '';
  $sql = "select * from view_areas WHERE id_gerencia=$ger_usu "; //echo $sql."<br/>";    
  $result_combo = mysqli_query( $conexion, $sql );
  while($rowc = mysqli_fetch_array($result_combo)){
    $prId = $rowc['id_area'];
    $prName = $rowc['des_area'];
    $parte3 = '<option value="' . $prId . '">' . $prName . '</option>';
    $parte2 = $parte2 . $parte3;
  }
  echo $parte2;
}

?>