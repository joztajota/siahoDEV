<?php

switch ($labor_status_m) {
    case 'CREADO':
        $enlace='dashboard.php?activo=postuladosxlabor&labor=1&bandera=2&labor_codigo=';
        break;
    case 'PRESELECCIONADO':
        $enlace='dashboard.php?activo=preseleccionados&labor=2&bandera=2&labor_codigo=';             
        break;   
    case 'VALIDADO':
        $enlace='dashboard.php?activo=preseleccionados&labor=3&bandera=2&labor_codigo=';             
        break;   
    case 'CANCELADO':
        $enlace='dashboard.php?activo=preseleccionados&labor=4&bandera=2&labor_codigo=';             
        break;  
    case 'EJECUCION':
        $enlace='dashboard.php?activo=preseleccionados&labor=5&bandera=2&labor_codigo=';             
        break;   
    case 'EJECUTADO':
        $enlace='dashboard.php?activo=preseleccionados&labor=6&bandera=2&labor_codigo=';             
        break;   
    case 'SUSPENDIDO':
        $enlace='dashboard.php?activo=preseleccionados&labor=7&bandera=2&labor_codigo=';             
        break;  
}
?>