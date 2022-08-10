<!DOCTYPE html>
<html class="fontawesome-i2svg-active fontawesome-i2svg-complete" lang="en">

<?php 
    // *** ESTILOS DEL PORTAL WEB  ************
    include('layouts/stylesstart.php');   ?>

<body class="sb-nav-fixed">

    <?php 
        // *** BARRA SUPERIOR DEL PORTAL WEB  ************
        include('layouts/barrasup.php');   ?>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">               
                <?php 
                // *** LATERAL IZQUIERDO DEL PORTAL WEB  ************
                include('layouts/lateralprincipal.php');   ?>

            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-12">
                        <h3 class="mt-12 mt-4 ms-12">Gestión de Usuarios</h3>
                        <ol class="breadcrumb mb-12 ms-12">
                            <li class="breadcrumb-item"><a href="dashboard.php?activo=inicio">inicio</a></li>
                            <li class="breadcrumb-item active">Gestión de Usuarios</li>
                        </ol>      
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card mb-12">
                             


                                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Ver Usuarios del Sistema
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>










                                </div>
                            </div>
                            
                        </div>






                        
                     
                    </div>
                </main>

            <?php 
            // *** PIE DE PÁGINA DEL PORTAL WEB  ************
            include('layouts/piedepagina.php');   ?>

            </div>
        </div>

        <?php 
        // *** SCRIPTS DEL PORTAL WEB  ************
        include('layouts/jsstart.php');   ?>

    </body>
</html>