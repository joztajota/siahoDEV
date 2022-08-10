<?php
/************************************************************
 * Diseñado por Jesus Santana
 * Fecha: 02/08/2022
 * CLASE r24h   usado en : REPORTE 24 HORAS 
 * 
 * 'clases/r24h.class.php';
 *************************************************************/

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';

//hereda de la clase conexion
class r24h extends conexion {
    private $R24Hid ='';
    private $complejoId ='';
    private $empleados_nroPersonal='';
    private $fecha='';
    private $turno='';
    //Activaciond e token para desarrollo
    private $token = '';//b43bbfc8bcf8625eed413d91186e8534

/************************************************************
 * Diseñado por Jesus Santana
 * Fecha: 06/08/2022
 * este metodo de la funcion R24H  mentrega todos los Tabs y los equipos para la carga de un reporte fintrado por complejo_id
 *  estructura para el retorno :
 *  $estructuraR24H = array(
 *      "tabs"  => array(),
 *       "equipos" => array()
 *  );
 *************************************************************/
    public function precargaR24H ($complejo_id = 0){  
        $_respuestas = new respuestas;
        $condicion ="";
        if($complejo_id != 0){
            $condicion =" where dg_r24h_precarga.complejoId = $complejo_id";
        }
        $query = "SELECT DISTINCT
                    dg_r24htabs.R24HTabsId,
                    dg_r24htabs.descripcion
                FROM
                dg_r24h_precarga
                INNER JOIN dg_r24htabs ON dg_r24htabs.R24HTabsId = dg_r24h_precarga.tabs
                INNER JOIN dm_complejo ON dm_complejo.id_complejo = dg_r24h_precarga.complejoId
                $condicion
                order by 1";

       $datosTabs = parent::ObtenerDatos($query);
       $tabsCount =0;   // controla la posicion del array para el insert en la variable

       if($datosTabs){ //recorre cada tabs
            foreach($datosTabs as $Tabs){
              
                
                
                $estructuraR24H[$tabsCount]['tabs']=$Tabs; //guarta los dtos del tabs  //print_r($estructuraR24H); die;
                $condicionTabsEquipo ='';
                if($Tabs['R24HTabsId']){
                    $condicionTabsEquipo =" where dg_r24h_precarga.complejoId =$complejo_id and  dg_r24h_precarga.tabs = ".$Tabs['R24HTabsId']."";
                }
                $querytablsEquipos = "SELECT
                                        dg_r24h_precarga.equipoId,
                                        dm_equipos.nombre
                                      FROM
                                        dg_r24h_precarga
                                        INNER JOIN dm_equipos ON dg_r24h_precarga.equipoId = dm_equipos.equipoId                
                                      $condicionTabsEquipo
                                      order by 1";

                $datosTabsEquipos = parent::ObtenerDatos($querytablsEquipos);
                $estructuraR24H[$tabsCount]['TabsEquipos']=$datosTabsEquipos;   //inserta los equipos en el array de salida
                $tabsCount++; 
            }
            return($estructuraR24H);
        }else{
            return $_respuestas->error_401("El complejo solicitado no tiene datos de Precarga");
        }
    }






}


?>