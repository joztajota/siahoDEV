<div class="container-fluid" >
    <h1 class="mt-1"></h1>
    <div class="card mb-0" >
        <div class="card-body fondoPrincipal ">
            <div class="card-header " style="color: #a30800; font-size: calc(0.5em + 1vw);font-family:arial;margin:0; text-align: center; padding: 5px 2px 5px 2px; /* font-weight:bold*/">
                <a href="dashboard.php?activo=adcn" >
                    <h4 style="color: #a30800"> 
                        <b> Administración &nbsp;de &nbsp; Desastres</b>
                    </h4>
                </a>                 
            </div>                                    
            <?php
            if ($id_rol==1) {  // ES ADMINISTRADOR
            ?>
            <div class="row mt-3 mb-0  p-2" style="height:6.6em;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #a30800; height: 6.6em; border: 5px double #deebf0bd; margin-left: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div class="" >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Planes</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=admon_usu&filtro=A" style=" text-decoration: none; ">
                                    <h6>Emergencia y Contingencia</h6>
                                </a>                                        
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/icon/planes.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #a30800; height: 6.6em; border: 5px double #deebf0bd;margin-right: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Planeamientos<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; ">
                                    <h6>Previos</h6>
                                </a>                                    
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 3.5em;" src="public/img/sistema/icon/planos.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }                   
            if (($id_rol==1) OR ($id_rol==5)) {  // ES ADMINISTRADOR, REGISTRADOR (ASPIRANTE)
            ?>
            <div class="row p-1 mt-2 mb-0 p-2" style="height:6.6em;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #a30800; height: 6.6em; border: 5px double #deebf0bd; margin-left: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Permisos<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=pycontrol" style=" text-decoration: none; ">
                                    <h6>De Uso, Conformidad de Bomberos</h6>
                                </a>                                        
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/icon/permisos.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #a30800; height: 6.6em; border: 5px double #deebf0bd;margin-right: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#e2e9ec;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Asesorías<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=pycontrol" style=" text-decoration: none; "><h6>Informes y Recomendaciones</h6></a>                                        
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4.5em;" src="public/img/sistema/icon/asesorias.png"/>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>     
            <?php }              
            if (($id_rol==1) OR ($id_rol==5))  {  // ADMINISTRADOR, ANALISTA RRHH 
            ?>  
            <div class="row p-1 mt-2 mb-0 p-2" style="height:6.6em;">                     
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #a30800; height: 6.6em; border: 5px double #deebf0bd; margin-left: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Atención de Emergencias</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=pycontrol" style=" text-decoration: none; "><h6>Informes y Recomendaciones</h6></a>                                        
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/icon/emergencias.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #a30800; height: 6.6em; border: 5px double #deebf0bd;margin-right: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Inventarios</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=pycontrol" style=" text-decoration: none; "><h6>Informes y Recomendaciones</h6></a>                                        
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/icon/inventario2.png"/>
                            </div>
                        </div>                        
                    </div>
                </div>  
            </div>             
            <?php }                 
           if (($id_rol==1) OR ($id_rol==3))  {  // ADMINISTRADOR, VERIFICADOR PCP
            ?>
            <div class="row p-1 mt-2 mb-0 p-2" style="height:6.6em;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #a30800; height: 6.6em; border: 5px double #deebf0bd; margin-left: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Leyes, Normas<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6></h6></a>                               
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/icon/lyn.png"/>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #a30800; height: 6.6em; border: 5px double #deebf0bd;margin-right: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Oficios<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6></h6></a>                               
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/icon/oficios.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
            <?php }    ?>  
        </div>
    </div>
</div>
            