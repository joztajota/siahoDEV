<div class="container-fluid" >
    <h1 class="mt-1"> </h1>
    <div class="card mb-0" >
        <div class="card-body fondoPrincipal  mt-5">
            <div class="card-header " style="color: #0e1951; 
            font-size: calc(0.2em + 1vw);font-family:arial;margin:0; 
            text-align: center; padding: 5px 2px 5px 2px; /* font-weight:bold*/">
                <h4><b>Bienvenidos al Portal del Sistema Integral <b>Gerencia de Seguridad Industrial, Ambiente e Higiene Ocupacional </b> </h4>
            </div>                                    
            <?php
            if ($id_rol==1) {  // ES ADMINISTRADOR
            ?>
            <div class="row mb-0  p-2" style="height:5.6em;">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border:5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Usuarios</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=admon_usu&filtro=A" style=" text-decoration: none; ">
                                    <h6>Crear y Editar Usuarios</h6>
                                </a>                                        
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/agregarusuario.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Configuración<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Definición de Criterios</h6></a>                                    
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 3.5em;" src="public/img/sistema/icon/sconfiguracion.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }                   
                if (($id_rol==1) OR ($id_rol==5)) {  // ES ADMINISTRADOR, REGISTRADOR (GERENTE)
                ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Planificación y Control<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=pycontrol" style=" text-decoration: none; "><h6>Plan y Proyectos</h6></a>                                        
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/gpyg.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#e2e9ec;">
                            <div >
                                <h3 class="titulos_principal"><b>Seguridad de los Procesos<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=sp" style=" text-decoration: none; "><h6>Seguridad Industrial, Seguimiento</h6></a>                                        
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/gsp.png"/>
                            </div>
                        </div>
                    </div>
                </div>  
                <?php }              
                if (($id_rol==1) OR ($id_rol==5))  {  // ADMINISTRADOR, GERENCIA SIAHO
                ?>  
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Administración Desastres</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=adcn" style=" text-decoration: none; "><h6>Continuidad de Negocio</h6></a>                               
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/gadycn.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Ambiente e Higiene Ocupacional</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=aho" style=" text-decoration: none; "><h6>Gestión</h6></a>                                    
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/gaeh.png"/>
                            </div>
                        </div>                        
                    </div>
                </div>  
                <?php }                 
                if (($id_rol==1) OR ($id_rol==3))  {  // ADMINISTRADOR, VERIFICADOR PYC
                ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Mixtas<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Reportes</h6></a>                               
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/em.png"/>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Reportes<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Consultar Registrados</h6></a>                               
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 4em;" src="public/img/sistema/icon/rei.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
                <?php }                    ?>   
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Manuales<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6> Instructivos para Usos</h6></a>                                    
                            </div>
                            <div class="imagen_principal" >
                                <img style="width:3.5em;" src="public/img/sistema/icon/manuales.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-2">
                    <div class="card bg text-white" style="background-color: #0e1951; height: 5.6em; border: 5px double #deebf0bd;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 class="titulos_principal"><b>Galería<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=fotos" style=" text-decoration: none; "><h6>Colección fotográfica</h6></a>                               
                            </div>
                            <div class="imagen_principal" >
                                <img style="width: 3.5em;" src="public/img/sistema/icon/galeria.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>
            