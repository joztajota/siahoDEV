<?php
//ARCHIVO BASE PARA LOS SERVICIOS
require_once 'clases/respuestas.class.php';
require_once 'clases/empleados.class.php';

$_respuestas= new respuestas;
$_empleados= new empleados;


if($_SERVER['REQUEST_METHOD'] == "GET"){//Get READ
    if(isset($_GET['page'])){
        $pagina = $_GET['page'];
        $listaEmpleados = $_empleados->listaEmpleados($pagina);
        //prepara salida del ws       
        header('Content-Type: applictaions/json');
        echo json_encode($listaEmpleados);
        http_response_code(200);
    }elseif (isset($_GET['NumPersonal'])) {
        $empleado = $_GET['NumPersonal'];
        $datosEmpleado = $_empleados->obtenerEmpleado($empleado);
        //prepara salida del ws 
        header('Content-Type: applictaions/json');
        echo json_encode($datosEmpleado);
        http_response_code(200);
    }

}elseif ($_SERVER['REQUEST_METHOD'] == "POST" ){//POST CREATE
   //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
   //enviamos etso al navegados/
    $datosArray = $_empleados->post($postBody);

   //Devolvemos la respuesta
    header('Content-Type: applictaions/json');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode =  $datosArray["result"]["error_id"];
        http_response_code($responseCode);
        }else{
            http_response_code(200);
        }

        echo json_encode($datosArray);

}elseif($_SERVER['REQUEST_METHOD'] == "PUT" ) {//PUT  UPDATER
    
    //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    //enviamos etso al navegados/
    $datosArray = $_empleados->put($postBody);

    //Devolvemos la respuesta
    header('Content-Type: applictaions/json');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode =  $datosArray["result"]["error_id"];
        http_response_code($responseCode);
        }else{
            http_response_code(200);
        }

        echo json_encode($datosArray);

}elseif($_SERVER['REQUEST_METHOD'] == "DELETE" ) {//DELETE
    //recibimos los datos enviados
    $postBody = file_get_contents("php://input");
    //enviamos etso al navegados/
    $datosArray = $_empleados->delete($postBody);

    //Devolvemos la respuesta
    header('Content-Type: applictaions/json');
    if(isset($datosArray["result"]["error_id"])){
        $responseCode =  $datosArray["result"]["error_id"];
        http_response_code($responseCode);
        }else{
            http_response_code(200);
        }

        echo json_encode($datosArray);





}else{
    header('Content-Type: applictaions/json');
    $datosArray =$_respuestas->error_405();
    echo(json_encode($datosArray));
}




?>