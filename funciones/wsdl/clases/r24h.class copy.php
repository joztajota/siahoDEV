<?php
/************************************************************
 * Diseñado por Jesus Santana
 * CLASE r24h   REPORTE 24 HORAS 
 * Metodo servidor: $_GET, $_POST, $_PUT, $_DELETE
 * 
 * 'clases/r24h.class.php';
 *************************************************************/

require_once 'conexion/conexion.php';
require_once 'respuestas.class.php';


//hereda de la clase conexion
class r24h extends conexion {


    //Tabla Principal de Empleados
    private $dg_r24h_header = "dg_r24h_header";

    //se debe crear atributos para las tablas que se van a validar en la funcion "post" 
    private $R24Hid ='';
    private $complejoId ='';
    private $empleados_nroPersonal='';
    private $fecha='';
    private $turno='';


    //Activaciond e token
    private $token = '';//b43bbfc8bcf8625eed413d91186e8534


    public function precargaR24H ($complejo_id = 0){
        $_respuestas = new respuestas;
        $condicion ="";
        if($complejo_id != 0){
            $condicion =" where dg_r24h_precarga.complejoId = $complejo_id";
        }
        $query = "SELECT
                    dg_r24h_precarga.complejoId,
                    dm_complejo.nombre_complejo,
                    dg_r24h_precarga.tabs,
                    dg_r24htabs.descripcion,
                    dg_r24h_precarga.equipoId,
                    dm_equipos.nombre
                FROM
                dg_r24h_precarga
                INNER JOIN dg_r24htabs ON dg_r24htabs.R24HTabsId = dg_r24h_precarga.tabs
                INNER JOIN dm_equipos ON dm_equipos.equipoId = dg_r24h_precarga.equipoId
                INNER JOIN dm_complejo ON dm_complejo.id_complejo = dg_r24h_precarga.complejoId
                $condicion
                order by 1, 3,5";

       $datos = parent::ObtenerDatos($query);

       if($datos){
    
            return($datos);
        }else{
            return $_respuestas->error_401("El complejo solicitado no tiene datos de Precarga");
        }
    }






}


?>