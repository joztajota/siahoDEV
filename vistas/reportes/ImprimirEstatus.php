
<?php 
    switch ($status_solicitud_m) {
        case "Enviadas":
            echo "ESTATUS: <b><u> SOLICITUD POR APROBAR </u></b>";  
            break;
        case "Aprobadas":
            echo "ESTATUS: <b> APROBADA </b>";  
            break;
        case "Verificadas":
            echo "ESTATUS: <b> APROBADA </b>";  
            break;
        case "Entradas":
            echo "ESTATUS: <b> APROBADA </b>";  
            break;
        case "Rechazadas":
            echo "ESTATUS:<span style= 'color: red;'><b> <u>RECHAZADA</u></b></span>";  
            break;
        case "Salidas Rechazadas":
            echo "ESTATUS:<span style= 'color: red;'><b> <u>RECHAZADA</u></b></span>";  
            break;
    }

?>