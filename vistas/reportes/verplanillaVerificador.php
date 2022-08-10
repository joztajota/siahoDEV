<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<script type="text/javascript" src="reportes/verPlanilla_archivos/jquery.js"></script>
<script type="text/javascript" src="reportes/verPlanilla_archivos/jquery_002.js"></script>
<?php
// *** ESTILOS DEL PORTAL WEB  ************
if ( !isset( $_SESSION ) ) {
    session_start();
  }

include( 'archivos_reportes/encabezadoCSS.php' );


if ( !isset( $_SESSION ) ) {
    session_start();
  }
  
// *** ESTILOS DEL PORTAL WEB  ************

if ( !isset( $aprobador ) ) {
    $aprobador="";
  }

if ($aprobador!=1){  
    include_once( '../../funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php' );
    include_once( '../../funciones/capa1.php' );
    include_once( '../../funciones/datosemisor.php' );
}
else{
    include_once( '../funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php' );
    include_once( '../funciones/capa1.php' );
    include_once( '../funciones/datosemisor.php' );    
    include( 'reportes/archivos_reportes/encabezadoCSS.php' );
}
?>




<script src="archivos_reportes/all.js" crossorigin="anonymous"></script>

</head>

<body>

    <table style="width:98%; margin: 30px 10px 40px 10px">
        <thead>

        <tr  >   
            <td style="width:100%;" >  
                <div style="width: 20%; float:left; font-size: 2.5rem; font-weight: margin:0">&nbsp;&nbsp;</div>
                <div style="width: 5%; float:left; font-size: 2.5rem; font-weight: margin:0">&nbsp;&nbsp; </div>
                <div style="width: 45%; float:left; font-size: 2.5rem; font-weight: margin:0">
                    <center> <b>Planilla de Solicitud  </b></center></div>
                <div style="width: 10%; float:right; padding:0;margin:0 0 0 10px">
                    <button style="height: 55px; width:85%; background-color: #69c9dd; border-color: #9fdbe8; " onclick="atras()">
                        <i class="fa fa-times" style="font-size: 200%; color:white; " ></i>
                    </button>                                           
                </div>  
                <div style="width: 10%; float:right; padding:0;margin:0">    
                    <button  style="height: 55px; width:85%; background-color:#69c9dd; border-color: #9fdbe8;" onclick="printDiv('myPrintArea') ">
                        <i class="fa fa-print" style="font-size: 200%; color:white; " ></i>
                    </button>                      
                </div> 

            </td>
        </tr>
        <tr>
            <td style="background-color: white; height: 20px;width: 100%;">    </td>
        </tr>
        <tr>
            <td style="background-color: #5caebf; height: 8px;">    </td>
        </tr>
        </thead>
    </table>

<!-- **************** INICIO DE AREA A IMPRIMIR     <i class="fas fa-fast-backward"></i> ***********************-->
<div id="myPrintArea">
<table class="tableprint">
    <tbody >
        <tr>
            <td colspan="2" class="pagencabezado3">
                Tipo de Pase: <br/><b> <?php echo $descripcion_pase_m; ?></b>
            </td>
            <td colspan="2"  class="pagencabezado3">
                <div class="divencabezadoderecha3">Estatus de la Solicitud: <br/> <b><?php if ($status_solicitud_m){ echo strtoupper($status_solicitud_m);} ?> </b></div>
    </BR>
            </td>
        </tr>
        
</table>

    <?php
    // *** ESTILOS DEL PORTAL WEB  ************
        include( 'planilla.php' );
    ?>
</div>
<?php

// *** SCRIPTS DEL PORTAL WEB  ************

include( '../../funciones/scriptsEmi.php' );
?>
<!--
<iframe style="border:0;position:absolute;width:0px;height:0px;left:0px;top:0px;" id="printArea_1" src="verPlanilla_files/index.htm"></iframe></body></html> -->