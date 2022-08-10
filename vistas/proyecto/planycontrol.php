<div class="container-fluid" >
    <h1 class="mt-1"> SIAHO</h1>
    <div class="card mb-0" >
        <div class="card-body fondoPrincipal ">
            <div class="card-header " style="color: #686868; font-size: calc(0.2em + 1vw);font-family:arial;margin:0; text-align: center; padding: 5px 2px 5px 2px; /* font-weight:bold*/">
                Bienvenidos al Portal del Sistema de SIHAO 
            </div>                                    
            <?php
            if ($id_rol==1) {  // ES ADMINISTRADOR
            ?>
            <div class="row mt-3 mb-0  p-2" style="height:5.6em;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd; margin-left: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div class="" >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Usuarios</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=admon_usu&filtro=A" style=" text-decoration: none; ">
                                    <h6>Crear y Editar Usuarios</h6>
                                </a>                                        
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/usuarios.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd;margin-right: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Configuración<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Definición de Criterios</h6></a>                                    
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 3.5em;" src="public/img/sistema/configuracion4.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }                   
            if (($id_rol==1) OR ($id_rol==5)) {  // ES ADMINISTRADOR, REGISTRADOR (ASPIRANTE)
            ?>
            <div class="row p-1 mt-1 mb-0 p-2" style="height:5.6em;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd; margin-left: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Planificación y Control<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=registrar" style=" text-decoration: none; "><h6>Plan y Proyectos</h6></a>                                        
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/registro.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd;margin-right: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#e2e9ec;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Seguridad de los Procesos<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Ver Estatus</h6></a>                                        
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/consultar.png"/>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>     
            <?php }              
            if (($id_rol==1) OR ($id_rol==5))  {  // ADMINISTRADOR, ANALISTA RRHH 
            ?>  
            <div class="row p-1 mt-1 mb-0 p-2" style="height:5.6em;">                     
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd; margin-left: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Administración de Desastres</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=admonAspirante" style=" text-decoration: none; "><h6>Continuidad de Negocio</h6></a>                               
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/aspirante.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd;margin-right: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Ambiente e Higiene</b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=admonObra" style=" text-decoration: none; "><h6>Gestión Ambiental</h6></a>                                    
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/labor.png"/>
                            </div>
                        </div>                        
                    </div>
                </div>  
            </div>             
            <?php }                 
           if (($id_rol==1) OR ($id_rol==3))  {  // ADMINISTRADOR, VERIFICADOR PCP
            ?>
            <div class="row p-1 mt-1 mb-0 p-2" style="height:5.6em;">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd; margin-left: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Reportes<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Reportes</h6></a>                               
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/reportes.png"/>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd;margin-right: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Consultas<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="" style=" text-decoration: none; "><h6>Consultar Registrados</h6></a>                               
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 4em;" src="public/img/sistema/buscar.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
            <?php }                    ?>      
            
            <div class="row p-1 mt-1 mb-0 p-2" style="height:5.6em;">                 
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd; margin-left: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 0.8vw); margin-bottom: 0;"><b>Manuales<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=manuales" style=" text-decoration: none; "><h6> Instructivos para Usos</h6></a>                                    
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 3.5em;" src="public/img/sistema/manualPrincipal2.png"/>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pb-1">
                    <div class="card bg text-white" style="background-color: #356288; height: 5.6em; border: 5px double #deebf0bd;margin-right: 1.5em;">
                        <div class="card-footer d-flex align-items-center icono" style="color:#fbfbfb;">
                            <div >
                                <h3 style="font-size: calc(1em + 1.3vw); margin-bottom: 0;"><b>Galería<sup style="font-size: 20px"></sup></b></h3>
                                <a class="small text-white stretched-link" href="dashboard.php?activo=fotos" style=" text-decoration: none; "><h6>Colección fotográfica del Proyecto</h6></a>                               
                            </div>
                            <div style="transition:all .3s linear;position:absolute; top:0.5em;  right:15px;z-index:0;" >
                                <img style="width: 3.5em;" src="public/img/sistema/camaramenulateralp.png"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>
            