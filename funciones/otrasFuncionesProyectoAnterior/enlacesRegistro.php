<?php

switch ($pagina_usu) {
    case 'inicio':
        $enlaceR="dashboard.php?activo=inicio";
        break;
    case 'admonAspirante':
        $enlaceR="dashboard.php?activo=admonAspirante";                   
        break;   
    case 'postuladosxlabor':        
        $enlaceR="dashboard.php?activo=postuladosxlabor&bandera=2&labor=1&labor_codigo=".$labor_codigo_m;                   
        break;  
    case 'preseleccionados':        
        $enlaceR="dashboard.php?activo=preseleccionados&bandera=2&labor=";
        $enlaceR=$enlaceR.$labor;
        $enlaceR=$enlaceR."&labor_codigo=".$labor_codigo_m;                   
        break; 
}

?>