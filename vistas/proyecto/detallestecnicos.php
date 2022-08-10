<?php
if ( !isset( $_SESSION ) ) {
  session_start();
}

?>
<div class="container-fluid px-12">
    <h3 class="mt-12 mt-4 ms-12">Especificaciones Técnicas</h3>
    <ol class="breadcrumb mb-12 ms-12">
        <li class="breadcrumb-item"><a href="dashboard.php?activo=inicio">inicio</a></li>
        <li class="breadcrumb-item active">Especificaciones Técnicas</li>
    </ol>      
    <div class="row" style="line-height: 2.2rem;">          
        <div class="col-xl-12">
            <div class="card mb-12">
                <div class="card-header text-danger">
                    <i class="fa fa-edit"></i>
                    &nbsp;&nbsp;&nbsp;<b>DETALLES  </b>                                           
                </div>
            </div>                                     
            <div class="row" style=" font-weight: bold; text-align:center; margin-left: 0.25rem !important;margin-top: 3rem !important;"> 
                <div class="col-xl-1" >  </div>
                <div class="col-xl-5"  style="background: #ccd3e3; line-height: 2.8rem; border: 1px solid #cacad7; font-size: 2vh "> RECURSO </div>
                <div class="col-xl-5"  style="background: #ccd3e3; line-height: 2.8rem; border: 1px solid #cacad7; font-size: 2vh"> OBSERVACIONES     </div>                                            
                <div class="col-xl-1" >  </div>
            </div>  
            <div class="row" style="margin-left: 0.25rem !important;">  
                <div class="col-xl-1" >  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7; font-weight: bold;color: #5e6c7d;"> Sistema Operativo del Servidor  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7;">Debian GNU/Linux 7.11 (Wheezy)  </div>                                            
                <div class="col-xl-1" >  </div>
            </div> 
            <div class="row" style="margin-left: 0.25rem !important;">  
                <div class="col-xl-1" >  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7; font-weight: bold;color: #5e6c7d;"> PHP  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7;">Desarrollo: Ver. 5.6.40 | También funciona: Ver. 5.5.37   </div>                                            
                <div class="col-xl-1" >  </div>
            </div> 
            <div class="row" style="margin-left: 0.25rem !important;">  
                <div class="col-xl-1" >  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7; font-weight: bold;color: #5e6c7d;"> Apache   </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7;"> Version 2.4     </div>                                            
                <div class="col-xl-1" >  </div>
            </div>   
            <div class="row" style="margin-left: 0.25rem !important;">  
                <div class="col-xl-1" >  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7; font-weight: bold;color: #5e6c7d;"> MariaDB  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7;"> Version 10.1.13 </div>                                            
                <div class="col-xl-1" >  </div>
            </div>   
            <div class="row" style="margin-left: 0.25rem !important;">  
                <div class="col-xl-1" >  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7; font-weight: bold;color: #5e6c7d;"> Diseño de Login: Bootstrap Login </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7;"> Versión 4, Tema: SB Admin-2  </div>                                            
                <div class="col-xl-1" >  </div>
            </div> 
            <div class="row" style="margin-left: 0.25rem !important;">  
                <div class="col-xl-1" >  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7; font-weight: bold;color: #5e6c7d;"> Diseño de Vistas: Bootstrap  </div>
                <div class="col-xl-5"  style="border: 1px solid #cacad7;"> Versión 5, Tema: SB Admin  </div>                                            
                <div class="col-xl-1" >  </div>
            </div> 
        </div>   
    </div> 
</div>      

<?php         
// *** SCRIPTS DEL PORTAL WEB  ************
include('layouts/jsstart.php'); 
?>        
<script>
    function filtra_por__estatus(){
        var filtrarpor= document.getElementById("filtrarpor").value;
        var fechadesde=document.getElementById("fechadesde").value;
        var fechahasta=document.getElementById("fechahasta").value;
        var fechahoy=document.getElementById("fechahoy").value;
        var x = document.getElementById("com_usu").value;
        comselec=document.getElementById("comselec").value = x;
        errorfiltrar=0;
        if ((fechadesde!="") || (fechahasta!="")){
            if (fechadesde>fechahasta){
                error="Fecha Desde No puede ser Mayor que Fecha Hasta";  
                errorfiltrar=1;
            }
            if (fechadesde>fechahoy){
                error=error+" \nFecha Desde No puede ser Mayor que la Fecha Actual";  
                errorfiltrar=1;
            }
            if ((fechadesde!="") && (fechahasta!="")){
                if ((fechahasta>fechadesde) || (fechahasta==fechadesde)){
                    errorfiltrar=0; 
                }
                else{
                    errorfiltrar=1;
                }
            }
        }     
        else { // Filtro SIN FECHA   Fechas= ""
            errorfiltrar=0;
        }   
        if (errorfiltrar==0){
            eval("document.location='gestionReportes.php?filtrarpor="+filtrarpor+"&fechadesde="+fechadesde+"&fechahasta="+fechahasta+"&com_selec="+comselec+"'");	
        }
        else{
            alert ("Por Favor corrija la fecha:\n"+error);  
        }
    }
</script>