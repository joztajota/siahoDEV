<?php

require_once 'clases/consumoApi.class.php';


$api = new API;




/* EJEMPLO PARA EL GET */
$token = '5adb40fdd6f8eb4fd0523376538eb533';
$URL	= 'http://localhost/siaho/funciones/wsdl/empleados?NumPersonal=1954558';
$rs 	= API::GET($URL,$token);
$array  = API::JSON_TO_ARRAY($rs);

print_r($array);
die;



/* EJEMPLO PARA EL POST */
$parametros = array(
	'header' 	=> array(
                'turno'=> 1,
                'supervisor'=>'jsantana',
                'fecha'=>'2022/08/25'
            ),
	'tabs'	=> array(
              'tabsid'=> 1,
              "equipoId"=> '125631283',
              'respuesta'=> 'si',
              'observacion'=>"blablabla"
            )
);

$token = '5adb40fdd6f8eb4fd0523376538eb533';
$URL	='http://localhost/siaho/funciones/wsdl/auth';
$rs = API::POST($URL,$token,$parametros);
$rs = API::JSON_TO_ARRAY($rs);

//print_r($rs);



















die;



/************INICIO CONSUMO DE SERVICIO************* */
$URLService= 'http://localhost/siaho/funciones/wsdl/r24h';
/*
Variables del servicio
preCargaComplejo_id
*/
$variable='?preCargaComplejo_id=1';

//http://localhost/siaho/funciones/wsdl/r24h?preCargaComplejo_id=1
$URLService=$URLService.$variable;

$ch = curl_init();
/************************************************************* */
//COMO ESPECIFICAR EL METODO QUE SE VA A USAR
//
// si no se especifica nada entonces el metodo por defecto es GET
// curl_setopt($ch,CURLOPT_POST, 1);                // SERVICIO APRA INSERTAR
// curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");  // SERVICIO APRA BORRAR
// curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "PUT");     // SERVICIO APRA UPDATE
//
//
/***************************************************************** */



curl_setopt($ch, CURLOPT_URL, $URLService);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resServce = curl_exec($ch);

curl_close($ch);
/***************FIN CONSUMO DE SERVICIO *************************** */




/***************LOGICA DEL FRONTEND********************** */
$tabsRows=json_decode($resServce);

var_dump($tabsRows);

//ARMAR REPORTE
/*
        foreach($tabsRows as $tabs){ //tabs
            //recorres los tabs
         
            print_r($tabs);


            foreach($tabs as $equipo){ //equipos
            //recorres los equipos
            
              print_r($equipo);
            }
            
        }
*/





?>