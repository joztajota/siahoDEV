
<?php


function consulta_tabla($tabla,$where,$conexion){
		
    //llamo al archivo de coneccion 
   // include( 'funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php' );
    //llamo a la funcion de coneccion 
   // $conexion=dbcon();
    $sql = "select * from $tabla $where ";//echo $sql."<br/>";
    $result=mysqli_query($conexion,$sql)or die(mysqli_error($conexion));

    return $result;
}//function complejos($where)
      
      
function construye_combo_value3($id_combo,$nombre_combo,$valor_seleccion,$id_campo,$des_campo,$clase,$tabla,$where,$otro,$conexion){
    
    $resultado_complejo=consulta_tabla($tabla,$where,$conexion);
    $parte1="<select class='$clase' id ='$id_combo' name='$nombre_combo'  $otro>
                ";
        $parte2="";
    if (($valor_seleccion=="")|| ($valor_seleccion=="SELECCIONE") ){$parte2="<option selected='selected' >SELECCIONE</option>";;}
    while($rowc = mysqli_fetch_array($resultado_complejo)){
        
        $id=$rowc[$id_campo];
        $descripcion=$rowc[$des_campo];
        
        if ($id==$valor_seleccion){$seleccion=" selected='selected' ";}
        else{$seleccion=" ";} 
            $parte3="<option value='$id' $seleccion>$descripcion</option>";
        $parte2=$parte2.$parte3;
                    
                
    }// while($rowc = mysqli_fetch_array($resultado_complejo))
                
        $parte4="</select>";
        
        $combo=$parte1.$parte2.$parte4;
        
        return $combo;

}//construye_combo_value


function verificarStatus($aspirante_cedula_m,$conexion){
    $sql = "select * from view_aspirantepcp_salud where registro_cedula=$aspirante_cedula_m " ;  
    $aspirante_query =mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
    while($row_u = mysqli_fetch_array($aspirante_query)){
        $registro_codigo = $row_u['registro_codigo'];
        $registro_validaPCP = $row_u['registro_validaPCP'];
        $registro_validaSalud = $row_u['registro_validaSalud'];
        if (($registro_validaPCP=="ELEGIBLE") and ($registro_validaSalud=="ELEGIBLE"))  {
            $sql_update = "UPDATE tbl_registro set registro_status='SELECCIONADO' WHERE registro_codigo LIKE'%$registro_codigo%' ";
            $resultado = mysqli_query( $conexion, $sql_update );     

            $sql_updateS = "UPDATE tbl_seleccion set seleccion_statusLaborRegistro='SELECCIONADO' WHERE seleccion_registro LIKE'%$registro_codigo%' ";
            $resultadoS = mysqli_query( $conexion, $sql_updateS );  

            $sqlLaborCodS = "select * from view_labor_aspirante where registro_codigo='$registro_codigo'";  
            $aspirante_LaborCS =mysqli_query($conexion,$sqlLaborCodS) or die(mysqli_error($conexion));
            $row_CS =mysqli_fetch_array($aspirante_LaborCS);
            $labor_codigo = $row_CS['labor_codigo'];


            $sqlLaborR = "select * from view_laborrequerimiento where labor_codigo=$labor_codigo" ;  
            $aspirante_LaborR =mysqli_query($conexion,$sqlLaborR) or die(mysqli_error($conexion));
            while($row_labor = mysqli_fetch_array($aspirante_LaborR)){
                $labor_codigo = $row_labor['labor_codigo'];
                $id_clasificacion = $row_labor['id_clasificacion'];
                $Clasificacion = $row_labor['Clasificacion'];
                $requerimiento_cantidad = $row_labor['requerimiento_cantidad'];

                $sqlLaborS = "select * from view_labor_aspirante where labor_codigo=$labor_codigo 
                and id_clasificacion=$id_clasificacion and registro_status='SELECCIONADO'";  
                $aspirante_LaborS =mysqli_query($conexion,$sqlLaborS) or die(mysqli_error($conexion));
                $cantidadSeleccionada = mysqli_num_rows( $aspirante_LaborS );

                if ($cantidadSeleccionada==$requerimiento_cantidad){
                    $sql_updateLabor = "UPDATE tbl_labor set labor_status='VALIDADO' WHERE labor_codigo=$labor_codigo ";
                    $resultadoLabor = mysqli_query( $conexion, $sql_updateLabor ); 
                }

            } // while
        }    // if es VALIDADO


        if ( (($registro_validaPCP=="ELEGIBLE") and ($registro_validaSalud=="NO ELEGIBLE")) or   (($registro_validaPCP=="NO ELEGIBLE") and ($registro_validaSalud=="ELEGIBLE"))  or   (($registro_validaPCP=="NO ELEGIBLE") and ($registro_validaSalud=="NO ELEGIBLE"))    )  {
            $sql_update = "UPDATE tbl_registro set registro_status='NO ELEGIBLE' WHERE registro_codigo LIKE'%$registro_codigo%' ";
            $resultado = mysqli_query( $conexion, $sql_update );     

            $sql_updateS = "UPDATE tbl_seleccion set seleccion_statusLaborRegistro='NO ELEGIBLE' WHERE seleccion_registro LIKE'%$registro_codigo%' ";
            $resultadoS = mysqli_query( $conexion, $sql_updateS );  

            $sqlLaborCodS = "select * from view_labor_aspirante where registro_codigo='$registro_codigo'";  
            $aspirante_LaborCS =mysqli_query($conexion,$sqlLaborCodS) or die(mysqli_error($conexion));
            $row_CS =mysqli_fetch_array($aspirante_LaborCS);
            $labor_codigo = $row_CS['labor_codigo'];


            $sqlLaborR = "select * from view_laborrequerimiento where labor_codigo=$labor_codigo" ;  
            $aspirante_LaborR =mysqli_query($conexion,$sqlLaborR) or die(mysqli_error($conexion));
            while($row_labor = mysqli_fetch_array($aspirante_LaborR)){
                $labor_codigo = $row_labor['labor_codigo'];
                $id_clasificacion = $row_labor['id_clasificacion'];
                $Clasificacion = $row_labor['Clasificacion'];
                $requerimiento_cantidad = $row_labor['requerimiento_cantidad'];

                $sqlLaborS = "select * from view_labor_aspirante where labor_codigo=$labor_codigo 
                and id_clasificacion=$id_clasificacion and registro_status='NO ELEGIBLE'";  
                $aspirante_LaborS =mysqli_query($conexion,$sqlLaborS) or die(mysqli_error($conexion));
                $cantidadSeleccionada = mysqli_num_rows( $aspirante_LaborS );

                if ($cantidadSeleccionada==$requerimiento_cantidad){
                    $sql_updateLabor = "UPDATE tbl_labor set labor_status='NO ELEGIBLE' WHERE labor_codigo=$labor_codigo ";
                    $resultadoLabor = mysqli_query( $conexion, $sql_updateLabor ); 
                }

            } // while
        }    // if es VALIDADO












    }
}

function actualizarstatusregistro($labor_codigo_m,$estatus,$conexion,$resultado){
    $estatus2="";
    $fecha_postulacion= date( 'Y-m-d' );

    $sql = "select * from view_seleccion_labor_aspirante where labor_codigo=$labor_codigo_m and labor_status='$estatus' " ;  
    $aspirante_query =mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
    while($row_u = mysqli_fetch_array($aspirante_query)){
        $seleccion_registro = $row_u['seleccion_registro'];  

        
        if (($estatus=="CANCELADO") or ($estatus=="EJECUTADO") or ($estatus=="SUSPENDIDO") ) {
            $estatus2="DISPONIBLE";
        }
        else {
            $estatus2=$estatus;
        }

        if ($estatus=="EJECUTADO") {
            $set_postula_registro=", registro_fecha_postulacion='$fecha_postulacion'";
            $set_postula_seleccion=", seleccion_fecha_postulacion='$fecha_postulacion'";

        }
        else {
            $set_postula_registro="";
            $set_postula_seleccion="";
        }

        $sql_update = "UPDATE tbl_registro set registro_status='$estatus2' $set_postula_registro WHERE registro_codigo='$seleccion_registro' ";                        
        $re = mysqli_query( $conexion, $sql_update );

        $sql_update2 = "UPDATE tbl_seleccion set seleccion_statusLaborRegistro='$estatus' $set_postula_seleccion WHERE seleccion_registro='$seleccion_registro' ";                        
        $re2 = mysqli_query( $conexion, $sql_update2 );

        $resultado=$resultado+$re;
    }
    echo $resultado;
}


?>