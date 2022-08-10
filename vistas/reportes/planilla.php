<?php
    if ( !isset( $_SESSION ) ) {
        session_start();
      }
      $fecha_hoy= date( "d-m-Y" );
     // include( '../../funciones/cargaFormularioLabor.php' );


    ?>
    <!-- **************** INICIO DE AREA A IMPRIMIR     <i class="fas fa-fast-backward"></i> ***********************-->
    <table class="tableprint">
        <tbody >
            <tr>
                <td colspan="5" class="pagencabezado1">
                    <img src="../../public/img/logo4.png" style="width: 100%;">
                   
                </td>
                <td colspan="5"  class="pagencabezado2">

                     <div class="divencabezadoderecha1"><center><?php echo $labor_nombre_m;  ?> </center></div>
                     
                </td>
            </tr>
            <table class= " tableprint " ; border="2">
            <tbody><tr class="fontcontenido">
                <td colspan="4" style="font-weight: bold;:8px 8px 8px 8px">
                    <div> Fecha Inicio:  <?php echo $labor_fechaInicio_m;  ?> </div>
                </td>
                <td colspan="1" class="tdbodyi" style="font-weight: bold;:0">
                    <div> Fecha Fin Estimada:  <?php echo $labor_fechafinEstimada_m;  ?> </div>
                </td>
                <td colspan="1" class="tdbodyi" style="font-weight: bold;:0 8px 0px 8px">
                    <div> Teimpo Duración: <?php echo $labor_tiempoDuracion_m;  ?> </div>
                </td>
                <td colspan="3" class="tdbodyi" style="font-weight: bold;:0 8px 0px 8px">
                    <div>  Cantidad Oficios: <?php echo $cantRequerimientos;  ?></div>
                </td>
                <td colspan="1" class="tdbodyi" style="font-weight: bold;:0 8px 8px 8px">
                 <div> Estatus: <?php  echo  $labor_status_m; ?> </div>
                </td>
            </tr>
        </tbody>
    
        
    </table>
    <?php 
    for ($c = 1; $c <= $cantRequerimientos; $c++ ) {  ?>
    <table class="tableprint">
        <tbody > 
            <tr  class="titulocontenido">
                <td colspan="8" >                                   
                    <b>  OFICIO: <?php echo $oficio_descripcion[$c]; ?></b>
                </td>
                <td colspan="8" style="text-align: right">                                   
                    <b>    CANTIDAD SOLICITADA: <?php echo $oficio_cantidad[$c];  ?>  </b>
                </td>
            </tr>

            <tr>
            
            <table class=" tableprint " ;="" style="font-size: 12px;line-height: 4;letter-spacing: 0.088em;font-weight: 400;" border="1">
                  
                   <tr style="background-color: #da9434; color:#000000;"> 
                            <th style=" text-align: center;" colspan="2">CEDULA</th>
                            <th style=" text-align: center;" colspan="2">NOMBRE Y APELLIDOS
                        </th>
                              <th style=" text-align: center;" colspan="2">ESTATUS</th>
                            <th style=" text-align: center;" colspan="2">VERIFICACION PCP</th>
                            <th style=" text-align: center;" colspan="2">VERIFICACION SALUD</th> 
    </tr>
    
                    </thead>
                    <tbody>
                    <?php 
                        $sql1 = "select * from view_preseleccionados where seleccion_labor=$labor_codigo_m and id_clasificacion=$oficio_id[$c] order by registro_id ASC";                                   
                        $aspirante_query1 =mysqli_query($conexion,$sql1) or die(mysqli_error($conexion));
                        $cantPostulados= mysqli_num_rows($aspirante_query1);    
                        $Faltarian=$oficio_cantidad[$c]-$cantPostulados;

                        $oficio_cantidadR=$oficio_cantidad[$c];                                   
                        if ($cantPostulados>0){
                            $num=1;
                            while(  ($row_u1 = mysqli_fetch_array($aspirante_query1)) && ($num <= $oficio_cantidad[$c])   ) {
                                $aspirante_cedula = $row_u1['aspirante_cedula']; 
                                $aspirante_nombre = $row_u1['aspirante_nombre'];                      
                                $registro_status = $row_u1['registro_status'];
                                $registro_validaPCP = $row_u1['registro_validaPCP'];
                                $registro_validaSalud = $row_u1['registro_validaSalud'];
                                $seleccion_statusLaborRegistro = $row_u1['seleccion_statusLaborRegistro'];                                            
                                ?>
                            <tr>
                            
                             <td colspan="2"><center><?php echo $aspirante_cedula; ?></center></td>
                                <td colspan="2"><center><?php echo $aspirante_nombre; ?></center></td> 
                                <td colspan="2"><center><?php echo $registro_status; ?></center></td>
                                <td colspan="2"><center><?php echo $registro_validaPCP; ?></center></td>
                                  <td colspan="2"><center><?php echo $registro_validaSalud; ?></center></td>
                            
                            </tr>
                                <?php  
                                $num++;
                            } //while
                            if ($Faltarian>0){   ?>
                                <tr style="">
                                    <td colspan=5 style="color:#da9434"><center><b> EXISTEN: <?php echo $Faltarian; ?> POSTULADOS SIN ASPIRANTES CON EL OFICIO DE <?php echo  $oficio_descripcion[$c];  ?> </b></center></td>
                                </tr>
                                <?php
                            }                                                                     
                        }  
                        else {   ?>
                            <tr style="">
                                <td colspan=5 style="color:#da9434"><center><b> EXISTEN: <?php echo $Faltarian; ?> POSTULADOS SIN ASPIRANTES CON EL OFICIO DE <?php echo  $oficio_descripcion[$c];  ?> </b></center></td>
                            </tr>
                            <?php
                        }                                                                         
                        ?>
                    </tbody>
                </table>
            </tr>          
        </tbody>                        
    </table>
<?php }   ?>
         
<!-- **************** FIN DE AREA A IMPRIMIR  ***********************-->
