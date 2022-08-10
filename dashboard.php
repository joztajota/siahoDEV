<?php 
    session_start();  
    include('pages.php'); 
    $colorpie="";  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    // *** ESTILOS DEL PORTAL WEB  ************
    include('vistas/layouts/stylesstart.php'); 

    if ($cuerpo=='vistas/principal.php'){
        include('public/menuCircularRRSS_Rojo/css/stylemenuCircular.php');     }
    else {
        include('public/menuCircularRRSS/css/stylemenuCircular.php');  
    }
      ?>
</head>
<body class="sb-nav-fixed">
    <?php 
        // *** BARRA SUPERIOR DEL PORTAL WEB  ************
        include('vistas/layouts/barrasup.php');   ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">               
                <?php 
                // *** LATERAL IZQUIERDO DEL PORTAL WEB  **********
                include('vistas/layouts/lateralprincipal.php');   ?>
            </div>
            <div id="layoutSidenav_content">
                <main style="position:relative;">
                    <?php include($cuerpo);   ?>
                </main>

                
            </div>
        </div>
        <div class="sb-sidenav-footer"></div>

        <?php 
        // *** SCRIPTS DEL PORTAL WEB  ************
        include('vistas/layouts/jsstart.php');   ?>

    </body>
    <footer>
    
    </footer>
</html>