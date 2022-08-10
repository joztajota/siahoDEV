<?php
$conexion = dbcon();


if ($bandera==1)  {  // CREAR REGISTRO NUEVO

  // CAPTURA LA GERENCIA
  $Unidad_Usuaria = array();
  $sql = "select * from tbl_gerencia order by id_gerencia asc";
  
  $Unidad_Usuaria_query = mysqli_query( $conexion, $sql );
  $cantUnidad_Usuaria1= mysqli_num_rows( $Unidad_Usuaria_query );
  $cantUnidad_Usuaria2 = mysqli_num_rows( $Unidad_Usuaria_query );
  $i = 1;
  while ( $row_u = mysqli_fetch_array( $Unidad_Usuaria_query ) ) {
    $Unidad_Usuaria[ $i ][ 'id_gerencia' ] = $row_u[ 'id_gerencia' ];
    $Unidad_Usuaria[ $i ][ 'des_gerencia' ] = $row_u[ 'des_gerencia' ];
    $i++;
  }
  // CAPTURA LOS ESTADOS

  $estados = array();
  $sql = "select * from tbl_estados order by id_estado asc";

  $usuario_query = mysqli_query( $conexion, $sql );
  $cants = mysqli_num_rows( $usuario_query );
  $cantEstado = mysqli_num_rows( $usuario_query );
  $i = 1;
  while ( $row_u = mysqli_fetch_array( $usuario_query ) ) {
    $estados[ $i ][ 'id_estado' ] = $row_u[ 'id_estado' ];
    $estados[ $i ][ 'estado' ] = $row_u[ 'estado' ];
    $i++;
  }
  // CAPTURA LOS MUNICIPIOS

  $municipios = array();
  $sql = "select * from tbl_municipios order by id_municipio asc";

  $usuario_queryM = mysqli_query( $conexion, $sql );
  $cantM = mysqli_num_rows( $usuario_queryM );

  $m = 1;
  while ( $row_u = mysqli_fetch_array( $usuario_queryM ) ) {
    $municipios[ $m ][ 'id_municipio' ] = $row_u[ 'id_municipio' ];
    $municipios[ $m ][ 'municipio' ] = $row_u[ 'municipio' ];
    $m++;
  }

  // CAPTURA LAS PARROQUIAS

  $parroquias = array();
  $sql = "select * from tbl_parroquias order by id_parroquia asc";

  $usuario_queryM = mysqli_query( $conexion, $sql );
  $cantP = mysqli_num_rows( $usuario_queryM );

  $p = 1;
  while ( $row_u = mysqli_fetch_array( $usuario_queryM ) ) {
    $parroquias[ $p ][ 'id_parroquia' ] = $row_u[ 'id_parroquia' ];
    $parroquias[ $p ][ 'parroquia' ] = $row_u[ 'parroquia' ];
    $p++;
  }

  // CAPTURA LOS NIVELES ACADEMICOS

  $nivelAcademico = array();
  $sql = "select * from tbl_nivelacademico order by id_nivelAcademico asc";

  $usuario_nivelAcademico = mysqli_query( $conexion, $sql );
  $cantnivelAcademico = mysqli_num_rows( $usuario_nivelAcademico );
  $f = 1;
  while ( $row_u = mysqli_fetch_array( $usuario_nivelAcademico ) ) {
    $nivelAcademico[$f][ 'id_nivelAcademico' ] = $row_u[ 'id_nivelAcademico' ];
    $nivelAcademico[$f][ 'descripcion_nivel' ] = $row_u[ 'descripcion_nivel' ];
    $f++;
  }

  // CAPTURA LOS OFICIOS

  $Clasificacion = array();
  $sql = "select * from tbl_clasificacion order by Clasificacion asc";

  $usuario_clasificacion = mysqli_query( $conexion, $sql );
  $cantclasificacion = mysqli_num_rows( $usuario_clasificacion );
  $i = 1;
  while ( $row_u = mysqli_fetch_array( $usuario_clasificacion ) ) {
    $Clasificacion[ $i ][ 'id_clasificacion' ] = $row_u[ 'id_clasificacion' ];
    $Clasificacion[ $i ][ 'Clasificacion' ] = $row_u[ 'Clasificacion' ];
    $i++;
  }

  // ROL   ///////////////////

    $rol = array();
    $sql = "select * from tbl_rol order by id_rol asc";

    $usuario_query =mysqli_query($conexion,$sql);
    $cantrol= mysqli_num_rows($usuario_query);
    $i=1;
    while($row_u = mysqli_fetch_array($usuario_query)){
        $rol[$i]= $row_u['des_rol'];
        $i++;

    }  

    $aspirante_nombre_m  ="";
    $aspirante_fechNac_m= "";
    $aspirante_fechNac_m ="";
    $aspirante_sexo_m  = "";
    $aspirante_edad_m ="";
    $aspirante_telcelular_m= "";
    $aspirante_telcantv_m ="";
    $aspirante_correo_m  = "";
    $aspirante_id_estado_m="";
    $aspirante_estado_m= "";
    $aspirante_id_municipio_m ="";  
    $aspirante_municipio_m = "";
    $aspirante_id_parroquia_m  = "";      
    $aspirante_parroquia_m  ="";
    $aspirante_nivelAcademico_m= "";
    $aspirante_descripcion_nivel_m="";
    $aspirante_status_m  = "";
    $aspirante_fechReg_m= "";
    $aspirante_Clasificacion_m="";
    $aspirante_cedula_m="";

}  // ****************  FIN  de If de Creación de Registro Nuevo  *************************

/// ***************************************************************************************
/// ***************************************************************************************

if (($bandera==2) || ($bandera==4) || ($bandera==9) ){ //  VER REGISTRO YA CREADO
  
  $sql_datos = "select * from view_aspirante WHERE registro_codigo = '$registro_codigo_m'  order by registro_id" ;  

  if ($aspirante_cedula_m!="") { /*  En este caso es un Aspirante apenas REGISTRADO     */
    $sql_datos = "select * from view_aspirante WHERE aspirante_cedula = '$aspirante_cedula_m'  and registro_status<>'INACTIVO' order by registro_id" ;
  }
  if ($bandera==9) {  /*  esta es la vista para el HISTORICO de todos los Registros Activos e INACTIVOS          */
    $sql_datos = "select * from view_aspirante WHERE registro_codigo = '$registro_codigo_m'  order by registro_id" ;
  }

  $result_m = mysqli_query( $conexion, $sql_datos );
  $filas = mysqli_num_rows( $result_m );

  if ( $filas > 0 ) {
    $rowm = mysqli_fetch_array( $result_m );
    $registro_id  = $rowm[ 'registro_id' ];
    $registro_codigo_m= $rowm[ 'registro_codigo' ];
    $registro_fechacrea_m  = $rowm[ 'registro_fechacrea' ];
    $registro_status_m  = $rowm[ 'registro_status' ];
    $registro_validaSalud_m  = $rowm[ 'registro_validaSalud' ];
    $registro_validaPCP_m  = $rowm[ 'registro_validaPCP' ];
    
    $aspirante_nombre_m  = $rowm[ 'aspirante_nombre' ];
    $aspirante_cedula_m=$rowm[ 'aspirante_cedula' ];

    $aspirante_fechNac_m= $rowm[ 'aspirante_fechNac' ];

    $aspirante_fechNac_m = date_create( $aspirante_fechNac_m );
    $aspirante_fechNac_m = date_format( $aspirante_fechNac_m, "Y-m-d" );

    $aspirante_sexo_m  = $rowm[ 'aspirante_sexo' ];
    $aspirante_edad_m = $rowm[ 'registro_edad' ];

    $aspirante_telcelular_m= $rowm[ 'registro_telcelular' ];
    $aspirante_telcantv_m = $rowm[ 'registro_telcantv' ];

    $aspirante_correo_m  = $rowm[ 'registro_correo' ];

    $aspirante_id_estado_m= $rowm[ 'id_estado' ];
    $aspirante_estado_m= $rowm[ 'estado' ];

    $aspirante_id_municipio_m = $rowm[ 'id_municipio' ];      
    $aspirante_municipio_m = $rowm[ 'municipio' ];

    $aspirante_id_parroquia_m  = $rowm[ 'id_parroquia' ];      
    $aspirante_parroquia_m  = $rowm[ 'parroquia' ];

    $aspirante_nivelAcademico_m= $rowm[ 'id_nivelAcademico' ];
    $aspirante_descripcion_nivel_m= $rowm[ 'descripcion_nivel' ];

    $aspirante_status_m  = $rowm[ 'registro_status' ];
    $aspirante_fechReg_m= $rowm[ 'registro_fechacrea' ];

    $registro_validaPCP = $rowm['registro_validaPCP'];
    $registro_validaSalud = $rowm['registro_validaSalud'];

       
      $sqloficio = "select * from view_oficio where registro_codigo LIKE '%$registro_codigo_m%' order by id_clasificacion asc";

    if ($bandera==9) {
      $sqloficio = "select * from view_oficio where registro_codigo LIKE '%$registro_codigo_m%' order by id_clasificacion asc";
    }
  
    $r_oficio = mysqli_query( $conexion, $sqloficio )or die( mysqli_error( $conexion ) );

    while ( $row_oficio = mysqli_fetch_array( $r_oficio ) ) {
      $aspirante_Clasificacion_m = $row_oficio[ 'Clasificacion' ];
    }
    $bandera=2;
  }
  else {   
    $aspirante_nombre_m  ="";
    $aspirante_fechNac_m= "";
    $aspirante_fechNac_m ="";
    $aspirante_sexo_m  = "";
    $aspirante_edad_m ="";
    $aspirante_telcelular_m= "";
    $aspirante_telcantv_m ="";
    $aspirante_correo_m  = "";
    $aspirante_id_estado_m="";
    $aspirante_estado_m= "";
    $aspirante_id_municipio_m ="";  
    $aspirante_municipio_m = "";
    $aspirante_id_parroquia_m  = "";      
    $aspirante_parroquia_m  ="";
    $aspirante_nivelAcademico_m= "";
    $aspirante_descripcion_nivel_m="";
    $aspirante_status_m  = "";
    $aspirante_fechReg_m= "";
    $aspirante_Clasificacion_m="";
    $aspirante_cedula_m="";
  }

  function imprime_fila($filtro_b,$registro_codigo_m){  
    $conexion = dbcon();    
    $sql = "select * from view_experiencia where registro_codigo='$registro_codigo_m' order by experiencia_registro,experiencia_item asc";
    $r_detalle = mysqli_query( $conexion, $sql )or die( mysqli_error( $conexion ) );
    $linea_tabla="";
    $i=0;
    while ( $row_d = mysqli_fetch_array( $r_detalle ) ) {
      $experiencia_lugar_oficio = $row_d[ 'experiencia_lugar' ];
      $experiencia_fecha_desde = $row_d[ 'experiencia_fecha_desde' ];
      $experiencia_fecha_hasta = $row_d[ 'experiencia_fecha_hasta' ];
      $experiencia_tiempo = $row_d[ 'experiencia_tiempo' ];
      $experiencia_ente_o_empresa = $row_d[ 'experiencia_empresa' ];          

      $experiencia_fecha_desde = implode( "/", array_reverse( explode( "-", $experiencia_fecha_desde) )); 
      $experiencia_fecha_hasta = implode( "/", array_reverse( explode( "-", $experiencia_fecha_hasta) )); 
                                
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
            <td colspan=4 class='fontcontenidocenter'>$experiencia_ente_o_empresa</td>
            <td colspan=2 class='fontcontenidocenter'>$experiencia_fecha_desde</td>                                                            
            <td colspan=2 class='fontcontenidocenter'>$experiencia_fecha_hasta</td>
            <td colspan=2 class='fontcontenidocenter'>$experiencia_tiempo</td>
            <td colspan=5 class='fontcontenido2'>$experiencia_lugar_oficio</td>
          </tr>";
      }
        
      $linea_tabla= $linea_tabla.$fila_t;              
    }//WHILE
      return $linea_tabla;    
  }   
  
  
}
//  FIN DE VER REGISTRO YA CREADO  


?>