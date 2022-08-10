<?php
session_start();
include_once( 'conecciones/MariaDB/connsisgm.php' );
include( 'funcionesGenerales.php' );

$conexion = dbcon();
$usersolicitud = $_SESSION[ "id_user" ];
$fecha = date( 'Y/m/d' );

$hora = date( "H:i:s" );
$fecha2=date( 'Y-m-d H:i:s' );
$bandera = $_REQUEST[ "bandera" ];


if ( $bandera == 'actualizarStatusLabor' ) {
 
  $labor_codigo_m = $_POST[ "labor_codigo_m" ];
  $labor_status_m = $_POST[ "labor_status_m" ];
  $estatus = $_POST[ "estatus" ];
  $sql_update = "UPDATE tbl_labor set labor_status='$estatus' WHERE labor_codigo=$labor_codigo_m ";
  $resultado = mysqli_query( $conexion, $sql_update );

  // Modificando status de los registros
  if ($labor_status_m!="CREADO"){
    $re=actualizarstatusregistro($labor_codigo_m,$estatus,$conexion,$resultado);
  }
  else { $re=2;  }

  echo $re;
}

if ( $bandera == 'verificarPCP' ) {
  $aspirante_cedula_m = $_POST[ "aspirante_cedula_m" ];
  $sql_update = "UPDATE tbl_registro set registro_validaPCP='ELEGIBLE', registro_fechaPCP='$fecha' WHERE registro_cedula LIKE'%$aspirante_cedula_m%' ";
  $resultado = mysqli_query( $conexion, $sql_update );
  verificarStatus($aspirante_cedula_m,$conexion);
  echo 1;
}

if ( $bandera == 'verificarSalud' ) {
  $aspirante_cedula_m = $_POST[ "aspirante_cedula_m" ];
  $sql_update = "UPDATE tbl_registro set registro_validaSalud='ELEGIBLE',  registro_fechaSalud='$fecha' WHERE registro_cedula LIKE'%$aspirante_cedula_m%' ";
  $resultado = mysqli_query( $conexion, $sql_update );
  verificarStatus($aspirante_cedula_m,$conexion);
  echo 1;
}

/* ******* CONDICION PARA NO ELEGIBLE DE PCP ********** */

if ( $bandera == 'verificarPCPNoElegible') {
  $aspirante_cedula_m = $_POST[ "aspirante_cedula_m" ];
  $sql_update = "UPDATE tbl_registro set registro_validaPCP='NO ELEGIBLE' , registro_fechaPCP='$fecha' WHERE registro_cedula LIKE'%$aspirante_cedula_m%' ";
  $resultado = mysqli_query( $conexion, $sql_update );
  verificarStatus($aspirante_cedula_m,$conexion);
  echo 1;
}

/* ******* CONDICION PARA NO ELEGIBLE DE SALUD ********** */

if ( $bandera == 'verificarSaludNoElegible' ) {
  $aspirante_cedula_m = $_REQUEST[ "aspirante_cedula_m" ];
  $sql_update = "UPDATE tbl_registro set registro_validaSalud='NO ELEGIBLE' , registro_fechaSalud='$fecha' WHERE registro_cedula LIKE'%$aspirante_cedula_m%' ";
  $resultado = mysqli_query( $conexion, $sql_update );
  verificarStatus($aspirante_cedula_m,$conexion);
  echo 1;
}

/* *******  ********** */
//////////////////////////////////////////////////////////////////////////////////////
///////////////////   MODIFICAR SOLICITUD  /////////////
/////////////////////////////////////////////////////////////////////////////////////

//echo $bandera;
if ( $bandera == 'obtener_ci_ficha' ) {
  $id_user = $_REQUEST[ "id_user" ];
  
  $sql_ver = "SELECT ced_usu FROM  tbl_usuario WHERE id_usu=$id_user ";
  //echo $sql_ver;
  $resultado = mysqli_query( $conexion, $sql_ver );
  $cants = mysqli_num_rows( $resultado );
    if ($cants>0){
         $row_u = mysqli_fetch_array( $resultado );
         $cedula_usu = $row_u[ 'ced_usu' ]; 
        echo  $cants."#".$cedula_usu;
    }else{
        
        echo "El usuario no se encuentra en la ase de Datos"; 
    }      
}//obtener_ci_ficha


?>