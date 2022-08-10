<?php

session_start();
include_once( 'conecciones/MariaDB/connsisgm.php' );
$conexion=dbcon();

$labor_codigo_m = $_REQUEST[ "labor_codigo_m" ];

$fecha_actual = date( 'Y/m/d' );
$hereg = date( "h:i:A" );

$oficio_id = array(); 
$oficio_descripcion = array(); 
$oficio_cantidad = array();

$sqloficio = "select * from view_laborrequerimiento where labor_codigo=$labor_codigo_m order by id_clasificacion ";   //echo $sql."<br/>";
$labor_oficio =mysqli_query($conexion,$sqloficio) or die(mysqli_error($conexion));
$cantRequerimientos= mysqli_num_rows($labor_oficio);

$oficio=1;

while($row_u = mysqli_fetch_array($labor_oficio)){
  $labor_nombre_m = $row_u['labor_nombre'];
  $labor_fechaInicio_m = $row_u['labor_fechaInicio'];
  $labor_fechafinEstimada_m= $row_u['labor_fechafinEstimada'];
  $labor_tiempoDuracion_m = $row_u['labor_tiempoDuracion'];
  $labor_status_m = $row_u['labor_status'];

  $oficio_id[$oficio] = $row_u['id_clasificacion'];
  $oficio_descripcion[$oficio] = $row_u['Clasificacion']; 
  $oficio_cantidad[$oficio] = $row_u['requerimiento_cantidad'];    
  $oficio++;                                                          
}

/*   ACTUALIZAR LA TABLA LABOR   EN ESTADO PRE-SELECCION   */
$sql_Labor = "UPDATE tbl_labor set labor_status='PRESELECCIONADO' WHERE labor_codigo= $labor_codigo_m ";
$resultado = mysqli_query( $conexion, $sql_Labor );

for ($c = 1; $c <= $cantRequerimientos; $c++ ) { 

  $sql1 = "select * from view_aspirante_oficiodisponibilidad where id_clasificacion=$oficio_id[$c] LIMIT $oficio_cantidad[$c] ";                                   
  $aspirante_query1 =mysqli_query($conexion,$sql1) or die(mysqli_error($conexion));
  $cantPostulados= mysqli_num_rows($aspirante_query1);    
  
  $num=1;
  while  ($row_u1 = mysqli_fetch_array($aspirante_query1)) {
      $registro_codigo[$num] = $row_u1['registro_codigo'];
      $registro_fecha_postulacion[$num] = $row_u1['registro_fecha_postulacion'];

      
      $sql_update2 = "insert into tbl_seleccion(seleccion_labor,seleccion_registro,
      seleccion_fecha_postulacion,seleccion_statusLaborRegistro,seleccion_fecha_crea)
      values($labor_codigo_m,'$registro_codigo[$num]','$registro_fecha_postulacion[$num]','PRESELECCIONADO','$fecha_actual')";      
      $resultado2 = mysqli_query( $conexion, $sql_update2 );
      $sql_update = "UPDATE tbl_registro set registro_status='PRESELECCIONADO' WHERE registro_codigo= '$registro_codigo[$num]' ";
      $resultado = mysqli_query( $conexion, $sql_update );

      $num++;
  } //while                                                                     
}

echo "1";

?>