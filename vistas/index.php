<?php 
    session_start();  
    include('pages.php');   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    // *** ESTILOS DEL PORTAL WEB  ************
    include('layouts/stylesstart.php');   ?>
    </head>
<body class="sb-nav-fixed">
    <?php 
        // *** BARRA SUPERIOR DEL PORTAL WEB  ************
        include('layouts/barrasup.php');   ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">               
                <?php 
                // *** LATERAL IZQUIERDO DEL PORTAL WEB  **********
                include('layouts/lateralprincipal.php');   ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?php  include($cuerpo);   ?>
                </main>

            <?php 
            // *** PIE DE PÁGINA DEL PORTAL WEB  ************
            //include('layouts/piedepagina.php');   ?>

            </div>
        </div>

        <?php 
        // *** SCRIPTS DEL PORTAL WEB  ************
        include('layouts/jsstart.php');   ?>

    </body>
    <footer>
        <?php 
     // *** PIE DE PÁGINA DEL PORTAL WEB  ************
            include('layouts/piedepagina.php');   ?>
    </footer>
</html>