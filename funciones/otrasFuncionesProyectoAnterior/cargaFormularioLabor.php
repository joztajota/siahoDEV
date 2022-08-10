<?php
$conexion = dbcon();


if ($bandera==1)  {  // Creación de Registro Nuevo

  $estado = array();
  $sql_estado = "select * from tbl_estados order by id_estado asc";
  
  $estado_query = mysqli_query( $conexion, $sql_estado );
  $cant_estado = mysqli_num_rows( $estado_query );
  $e = 1;
  while ( $row_estado = mysqli_fetch_array( $estado_query ) ) {
    $estado[$e][ 'id_estado' ] = $row_estado[ 'id_estado' ];
    $estado[$e][ 'estado' ] = $row_estado[ 'estado' ];
    $e++;
  }

  $complejo = array();
  $sqlcom = "select * from tbl_complejo_otros where id_complejo<>12 order by id_complejo asc";

  $usuario_querycom =mysqli_query($conexion,$sqlcom);
  $cantcomdef = mysqli_num_rows( $usuario_querycom );

  $i=1;
  while($row_com = mysqli_fetch_array($usuario_querycom)){
    $complejo[$i]['id_complejo']= $row_com['id_complejo'];
      $complejo[$i]['siglas_complejo']= $row_com['siglas_complejo'];
      $complejo[$i]['nombre_complejo']= $row_com['nombre_complejo'];

      $i++;
  }

  $Unidad_Usuaria = array();
  $sql = "select * from tbl_gerencia order by id_gerencia asc";
  
  $Unidad_Usuaria_query = mysqli_query( $conexion, $sql );
  $cantUnidad_Usuaria2 = mysqli_num_rows( $Unidad_Usuaria_query );
  $i = 1;
  while ( $row_u = mysqli_fetch_array( $Unidad_Usuaria_query ) ) {
    $Unidad_Usuaria[ $i ][ 'id_gerencia' ] = $row_u[ 'id_gerencia' ];
    $Unidad_Usuaria[ $i ][ 'des_gerencia' ] = $row_u[ 'des_gerencia' ];
    $i++;
  }
  
}  // ****************FIN de If *************************

if (($bandera==2) || ($bandera==4)){ //Visualizar Registro   Verificar Registro    

  $sql_datos = "select * from view_laborrequerimiento WHERE labor_codigo = $labor_codigo_m";
  $result_m = mysqli_query( $conexion, $sql_datos );
  $filas = mysqli_num_rows( $result_m );

  if ( $filas > 0 ) {
    $rowm = mysqli_fetch_array( $result_m );     
    $labor_nombre_m  = $rowm[ 'labor_nombre' ];

    $labor_fechaInicio_m = $rowm[ 'labor_fechaInicio' ];
    $labor_fechaInicio_m = date_create( $labor_fechaInicio_m );
    $labor_fechaInicio_m = date_format( $labor_fechaInicio_m, "Y-m-d" );
    $labor_nroContrato_m = $rowm[ 'labor_nroContrato' ];

    $labor_fechafinEstimada_m = $rowm[ 'labor_fechafinEstimada' ];
    $labor_fechafinEstimada_m = date_create( $labor_fechafinEstimada_m );
    $labor_fechafinEstimada_m = date_format( $labor_fechafinEstimada_m, "Y-m-d" );

    $labor_tiempoDuracion_m  = $rowm[ 'labor_tiempoDuracion' ];
    $labor_contratistaResponsable_m = $rowm[ 'labor_contratistaResponsable' ];
    $labor_unidadUsuaria_m = $rowm[ 'labor_unidadUsuaria' ];
    $labor_inspector_m = $rowm[ 'labor_inspector' ];
    $labor_status_m  = $rowm[ 'labor_status' ];

    $labor_estado_m = $rowm[ 'estado' ];
    $labor_complejo_m_ = $rowm[ 'nombre_complejo' ];
    $labor_unidadUsuaria_m = $rowm[ 'des_gerencia' ];

               
  }else{   
      $labor_nombre_m  ="";
      $labor_fechaInicio_m= "";
      $labor_fechafinEstimada_m ="";
      $labor_tiempoDuracion_m  = "";
      $labor_contratistaResponsable_m="";
      $labor_unidadUsuaria_m= "";
      $labor_inspecto_m ="";
      $labor_status_m = "";
  }

function imprime_fila($filtro_b,$labor_codigo_m){  
    $conexion = dbcon();    
    $sql = "select * from view_laborrequerimiento where labor_codigo='$labor_codigo_m' order by id_clasificacion ASC";
    $r_detalle = mysqli_query( $conexion, $sql )or die( mysqli_error( $conexion ) );
    $cantRequerimientos= mysqli_num_rows($r_detalle);
    $linea_tabla="";
    $i=0;
    while ( $row_d = mysqli_fetch_array( $r_detalle ) ) {
      $Clasificacion = $row_d[ 'Clasificacion' ];
      $requerimiento_cantidad = $row_d[ 'requerimiento_cantidad' ]; 
      if ($filtro_b==1){        
          $fila_t="<tr><td colspan=1 style='text-decoration:none'><span ></span></td><td colspan=6><input type='text' name='descripcion[]' id='descripcion[]' style='text-align: left; text-transform:uppercase;' value= '$descripcion_d'></td><td colspan=2 ><input type='text' name='serial[]' id='serial[]' style='text-align: center; text-transform:uppercase;' value= '$serial_d'/></td><td colspan=2 ><input type='text' name='cantidad[]' id='cantidad[]' value= '$cantidad_d' onkeyPress='return solo_num_flotante(event)' /></td><td colspan=2 ><span><select id='unidad[]' name='unidad[]' style='width: 100%;' class='chosen-select'><option value='UNIDAD'$val11   >UNIDAD</option><option value='GRAMO' $val12>GRAMO</option><option value='KILOGRAMO' $val13>KILOGRAMO</option><option value='TONELADA'$val14>TONELADA</option><option value='LITRO' $val15>LITRO</option><option value='GALON' $val16>GALON</option><option value='BARRIL' $val17>BARRIL</option></select></span></td><td colspan=3><span><select name='condicion[]' id='condicion[]' style='width: 100%;' class='chosen-select'><option value='NUEVO' $val18>NUEVO</option><option value='USADO'  $val19>USADO</option><option value='DANADO'  $val20>DA&Ntilde;ADO</option></select></span></td><td hidden='hidden'><input type='hidden' name='carticulo[]' id='carticulo[]' value='' /></td></tr>";        
      }            
      if ($filtro_b==1){        
          $fila_t="<tr><td colspan=1 style='text-decoration:none'><span ></span></td><td colspan=6><input type='text' name='descripcion[]' id='descripcion[]' style='text-align: left; text-transform:uppercase;' value= '$descripcion_d'></td><td colspan=2 ><input type='text' name='serial[]' id='serial[]' style='text-align: center; text-transform:uppercase;' value= '$serial_d'/></td><td colspan=2 ><input type='text' name='cantidad[]' id='cantidad[]' value= '$cantidad_d'  onkeyPress='return solo_num_flotante(event)' /></td><td colspan=2 ><span><select id='unidad[]' name='unidad[]' style='width: 100%;' class='chosen-select'><option value='UNIDAD'$val11   >UNIDAD</option><option value='GRAMO' $val12>GRAMO</option><option value='KILOGRAMO' $val13>KILOGRAMO</option><option value='TONELADA'$val14>TONELADA</option><option value='LITRO' $val15>LITRO</option><option value='GALON' $val16>GALON</option><option value='BARRIL' $val17>BARRIL</option></select></span></td><td colspan=3><span><select name='condicion[]' id='condicion[]' style='width: 100%;' class='chosen-select'><option value='NUEVO' $val18>  NUEVO</option><option value='USADO'  $val19>USADO</option><option value='DANADO'  $val20>DA&Ntilde;ADO</option></select></span></td><td hidden='hidden'><input type='hidden' name='carticulo[]' id='carticulo[]' value='' /></td></tr>";        
      }      
      if ($filtro_b==2){
        $i++;
        $fila_t="<tr>
            <td colspan=1 class='fontcontenidocenter'>$i</td>
            <td colspan=11 class='fontcontenidocenter'>$Clasificacion</td>
            <td colspan=4 class='fontcontenidocenter'>$requerimiento_cantidad</td>    
          </tr>";
        }            
      $linea_tabla= $linea_tabla.$fila_t;                
    }//WHILE
      return $linea_tabla;    
  }
}

if ($labor>0) {  // Crear y Visualizar Labor
  $conexion=dbcon();
  $oficio_id = array(); 
  $oficio_descripcion = array(); 
  $oficio_cantidad = array();
  
  $sqloficio = "select * from view_laborrequerimiento where labor_codigo=$labor_codigo_m order by id_clasificacion ";   //echo $sql."<br/>";
  $labor_oficio =mysqli_query($conexion,$sqloficio) or die(mysqli_error($conexion));
  $cantRequerimientos= mysqli_num_rows($labor_oficio);  
  $oficio=1;
  
  if ($cantRequerimientos>0){
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
  }
  else { $labor_nombre="No hay datos que Mostrar";} 

}  // ****************FIN de If *************************

?>