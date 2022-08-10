<?php
if ( !isset( $_SESSION ) ) {
  session_start();
}

?>
    <link rel="stylesheet" type="text/css" href="public/galeriaImagenes/jquery.lightbox.css">
    <link rel="stylesheet" href="public/galeriaImagenes/demo.css">


    <div class="container-fluid px-12">
        <h3 class="mt-12 mt-4 ms-12">Galeria</h3>
        <ol class="breadcrumb mb-12 ms-12">
            <li class="breadcrumb-item"><a href="dashboard.php?activo=inicio">inicio</a></li>
            <li class="breadcrumb-item active">Galeria</li>
        </ol>      
        <div class="row" style="line-height: 2.2rem;">          
            <div class="col-xl-12">
                <div class="card mb-12">
                    <div class="card-header text-danger">
                        <i class="fa fa-images"></i>
                        &nbsp;&nbsp;&nbsp;<b>Galería de Fotos </b>                                           
                    </div>
                </div>                                     
                <div class="row" style=" font-weight: bold; margin-left: 0.25rem !important;margin-top: 2rem !important;"> 
                    <div class="col-xl-1" >  </div>
                    <div class="col-xl-10"  style="background: #ccd3e3; line-height: 2.8rem; border: 1px solid #cacad7; font-size: 2vh"> REUNIONES Y ENCUENTROS...     </div>                                                                                
                    <div class="col-xl-1" >  </div>
                </div>  
                    
                <div class="row" style="margin-left: 0.25rem !important;">  
                    <div class="col-xl-1" >  </div>
                    <div class="col-xl-10" style=" border: 1px solid #cacad7;padding:0">  

                        <!-- INICIO DE GALERIA DE FOTOS   -->
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 5"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 6"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 7"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 8"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 9"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10" aria-label="Slide 10"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active" >
                                    <img src="vistas/galeria/Documentacion/1erareunion/encuentro_1.jpg" class="d-block w-100" alt="...">                            
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Primera Reunión: 13 de Mayo de 2022</h5>
                                        <p>Gerentes de SIAHO, Consultores SAP y desarrolladores de TI</p>
                                    </div>
                                </div>
                                <div class="carousel-item" >
                                    <img src="vistas/galeria/Documentacion/1erareunion/encuentro_2.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Primera Reunión: 13 de Mayo de 2022</h5>
                                        <p>Gerentes de SIAHO, Consultores SAP y desarrolladores de TI</p>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="vistas/galeria/Documentacion/1erareunion/encuentro_3.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Primera Reunión: 13 de Mayo de 2022</h5>
                                        <p>Gerentes de SIAHO, Consultores SAP y desarrolladores de TI</p>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="vistas/galeria/Documentacion/1erareunion/encuentro_4.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Primera Reunión: 13 de Mayo de 2022</h5>
                                        <p>Gerentes de SIAHO, Consultores SAP y desarrolladores de TI</p>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="carousel-item" >
                                    <img src="vistas/galeria/Documentacion/moron/encuentro_1.jpg" class="d-block w-100" alt="...">                            
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Laevantamiento de Información en Morón:</h5>
                                        <p>Desde el 23 de Mayo al 25 de Mayo<br/>Gerentes de SIHAO, consultores SAP y Desarrolladora de TI, </p>                                        
                                    </div>
                                </div>
                                <div class="carousel-item" >
                                    <img src="vistas/galeria/Documentacion/moron/encuentro_2.jpg" class="d-block w-100" alt="...">                            
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Laevantamiento de Información en Morón:</h5>
                                        <p>Desde el 23 de Mayo al 25 de Mayo<br/>Gerentes de SIHAO, consultores SAP y Desarrolladora de TI, </p>                                        
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="vistas/galeria/Documentacion/reunionenanzoategui/encuentro_1.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Laevantamiento de Información en CPJAA:</h5>
                                        <p>Desde el 29 de Mayo al 01 de Junio<br/>Gerentes de SIHAO, consultores SAP y Desarrolladora de TI, </p>                                        
                                    </div>
                                </div>
                                <div class="carousel-item" >
                                    <img src="vistas/galeria/Documentacion/reunionenanzoategui/encuentro_2.jpg" class="d-block w-100" alt="...">                            
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Laevantamiento de Información en CPJAA:</h5>
                                        <p>Desde el 29 de Mayo al 01 de Junio<br/>Gerentes de SIHAO, consultores SAP y Desarrolladora de TI, </p>                                        
                                    </div>
                                </div>
                                <div class="carousel-item" >
                                    <img src="vistas/galeria/Documentacion/reunionenanzoategui/encuentro_3.jpg" class="d-block w-100" alt="...">                            
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Laevantamiento de Información en CPJAA:</h5>
                                        <p>Desde el 29 de Mayo al 01 de Junio<br/>Gerentes de SIHAO, consultores SAP y Desarrolladora de TI, </p>                                        
                                    </div>
                                </div>
                                <div class="carousel-item" >
                                    <img src="vistas/galeria/Documentacion/reunionenanzoategui/encuentro_4.jpg" class="d-block w-100" alt="...">                            
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Laevantamiento de Información en CPJAA:</h5>
                                        <p>Desde el 29 de Mayo al 01 de Junio<br/>Gerentes de SIHAO, consultores SAP y Desarrolladora de TI, </p>                                        
                                    </div>
                                </div>
                                <div class="carousel-item" >
                                    <img src="vistas/galeria/Documentacion/reunionenanzoategui/encuentro_5.jpg" class="d-block w-100" alt="...">                            
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 >Laevantamiento de Información en CPJAA:</h5>
                                        <p>Desde el 29 de Mayo al 01 de Junio<br/>Gerentes de SIHAO, consultores SAP y Desarrolladora de TI, </p>                                        
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <!-- FIN DE GALERIA DE FOTOS   -->

                    </div>                 
                    <div class="col-xl-1" >  </div>
                </div>                                                          
            </div>   
        </div> 
    </div>        
<?php         
    // *** SCRIPTS DEL PORTAL WEB  ************
    include('layouts/jsstart.php'); 
?> 