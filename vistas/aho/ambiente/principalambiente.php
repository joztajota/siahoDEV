<?php 
    $colorpie="color:#0d5304;"
?>
<div class="container-fluid" >
    <h1 class="mt-1"> </h1>
    <div class="card mb-0" >
        <div class="card-body fondoPrincipal ">
            <div class="card-header mt-0 mb-0 pt-3 pb-3" " style="color: #0d5304; font-size: calc(0.5em + 1vw);font-family:arial;margin:0; text-align: center; padding: 5px 2px 5px 2px; /* font-weight:bold*/">
                <a href="dashboard.php?activo=aho" >
                    <h4 style="color: #0d5304"> <b> A m b i e n t e </b> </h4>
                </a>                
            </div>                                    
            <?php
            if ($id_rol==1) {  // ES ADMINISTRADOR
            ?>
            <div class="row mb-0  p-2" >
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0d5304; height: 6.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div>
                                <h3 class="titulos_principal"><b>Inspecciones</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=inspeccionesambiente" style=" text-decoration: none; ">
                                    <h6>Inspecciones y Diagnóstico</h6>
                                </a>                                        
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/inspecciones.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0d5304; height: 6.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Evaluación de Aspectos<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Matriz, Controles</h6></a>                                    
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 3.5em;" src="public/img/sistema/icon/aspectos.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }                   
                if (($id_rol==1) OR ($id_rol==5)) {  // ES ADMINISTRADOR, REGISTRADOR (ASPIRANTE)
                ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0d5304; height: 6.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Monitoreo<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Recomendaciones</h6></a>                                        
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/monitor.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0d5304; height: 6.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#e2e9ec;">
                            <div >
                                <h3 class="titulos_principal"><b>Eventos Ambientales<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Recomendaciones</h6></a>                                        
                            </div>
                            <div class="imagen_principal">
                                <img style="width: 4em;" src="public/img/sistema/icon/eventos.png"/>
                            </div>
                        </div>
                    </div>
                </div>  
                <?php }              
                if (($id_rol==1) OR ($id_rol==5))  {  // ADMINISTRADOR, ANALISTA RRHH 
                ?>  
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0d5304; height: 6.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Aspectos Ambientales</b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Recomendaciones</h6></a>                                        
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/aspectosa.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0d5304; height: 6.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Proyectos Ambientales</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=pambientales" style=" text-decoration: none; "><h6>Informes y Recomendaciones</h6></a>                                        
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/proyectosa.png"/>
                            </div>
                        </div>                        
                    </div>
                </div>  
                <?php }                 
                if (($id_rol==1) OR ($id_rol==3))  {  // ADMINISTRADOR, VERIFICADOR PCP
                ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0d5304; height: 6.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Leyes, Normas<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6></h6></a>                               
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/lyn.png"/>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0d5304; height: 6.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Oficios<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6></h6></a>                               
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/oficios.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
                <?php }    ?>  
            </div>                 
        </div>
    </div>
</div>
            