<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="reportes/verPlanilla_archivos/jquery.js"></script>
        <script type="text/javascript" src="reportes/verPlanilla_archivos/jquery_002.js"></script>
        <?php
        // *** ESTILOS DEL PORTAL WEB  ************
        if ( !isset( $_SESSION ) ) {
            session_start();
        }  
        include( 'archivos_reportes/encabezadoCSS.php' );
        include_once('../../funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php');

        if(isset($_GET['bandera'])){
            $bandera=$_GET['bandera'];        
        }


        if(isset($_GET['labor_codigo'])){
            $labor_codigo_m=$_GET['labor_codigo'];   
            $labor=2;     
            include( '../../funciones/cargaFormularioLabor.php' );
        }
        ?>
        <script src="archivos_reportes/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <table style="width:98%; margin: 30px 10px 40px 10px">
            <thead>
                <tr  >   
                    <td style="width:88%;" >  
                        <div style="width: 20%; float:left; font-size: 2rem; font-weight: margin:0">&nbsp;&nbsp;</div>
                        <div style="width: 5%; float:left; font-size: 2rem; font-weight: margin:0">&nbsp;&nbsp; </div>
                        <div style="width: 45%; float:left; font-size: 2.5rem; font-weight: margin:0; color:#8c4412 ">
                        <center>   <b>Planilla de Postulados </b>  </center>   
                        </div>
                        <div style="width: 10%; float:right; padding:0;margin:0 0 0 10px">
                            <button style="height: 55px; width:85%; background-color: #8c4412; border: 5px double #f0ecec;" onclick="atras()">
                                <i class="fa fa-times" style="font-size: 200%; color:white; " ></i>
                            </button>                                           
                        </div>  
                        <div style="width: 10%; float:right; padding:0;margin:0">    
                            <button  style="height: 55px; width:85%; background-color: #8c4412; border: 5px double #f0ecec;" onclick="printDiv('myPrintArea') ">
                                <i class="fa fa-print" style="font-size: 200%; color:white; " ></i>
                            </button>                      
                        </div>  
                    </td>
                </tr>
                <tr>
                    <td style="background-color: white; height: 2px;width: 100%;">    </td>
                </tr>
                <tr>
                    <td style="background-color: #8c4412; height: 9px;">    </td>
                </tr>
            </thead>
        </table>

    <!-- **************** INICIO DE AREA A IMPRIMIR     <i class="fas fa-fast-backward"></i> ***********************-->
        <div id="myPrintArea">
            <?php
            // *** ESTILOS DEL PORTAL WEB  ************
            include( 'planilla.php' );
            ?>
        </div>

        <script type="text/javascript">
            function printDiv(nombreDiv) {
                var contenido= document.getElementById(nombreDiv).innerHTML;
                var contenidoOriginal= document.body.innerHTML;

                document.body.innerHTML = contenido;

                window.print();

                document.body.innerHTML = contenidoOriginal;
            }

            function atras(){    
                setTimeout(window.close, 0);
            }
        </script>

    </body>
</html>