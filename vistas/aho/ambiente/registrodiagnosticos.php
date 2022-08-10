<?php
if ( !isset( $_SESSION ) ) {
  session_start();
}
$enlaceR="dashboard.php?activo=inicio";
include( 'funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php' );

$fecha_actual = date( 'd/m/Y' );
$hereg = date( "h:i:A" );

$color="";
if ( isset( $_REQUEST[ "bandera" ] ) ) {
  $bandera=$_REQUEST[ "bandera" ];  //Ver Registro
}
else{
  $bandera=1;  //Crear Registro
}

if ( isset( $_REQUEST[ "pagina_usu" ] ) ) {
  $pagina_usu=$_REQUEST[ "pagina_usu" ];  //Ver 
}
else{
  $pagina_usu="inicio";  //Crear Registro
}

if ( isset( $_REQUEST[ "labor_codigo" ] ) ) {
  $labor_codigo_m=$_REQUEST[ "labor_codigo" ];  //Ver Registro
}
else{
  $labor_codigo_m="";  //Crear Registro
}
if ( isset( $_REQUEST[ "labor" ] ) ) {
  $labor=$_REQUEST[ "labor" ];  //Ver Registro
}
else{
  $labor=0;  //Crear Registro
}

if ( isset( $_REQUEST[ "aspirante_cedula" ] ) ) {
  $aspirante_cedula_m=$_REQUEST[ "aspirante_cedula" ];  
}
else{
  $aspirante_cedula_m="";  
}

if ( isset( $_REQUEST[ "registro_codigo" ] ) ) {
  $registro_codigo_m=$_REQUEST[ "registro_codigo" ];  
}
else{
  $registro_codigo_m="";  
}
$image="public/img/sistema/aspiranteazuloscuro.png";
include( 'funciones/funcionesGenerales/enlaces.php' );

/*include( 'funciones/funcionesGenerales/cargaFormulario.php' );
include( 'funciones/funcionesGenerales/cargaUsuario.php' );
*/

$colorAlert="background-color:#ee9528d1; border: 2px solid rgba(121, 91, 25, 0.95); font-size:1.1em;border-radius: 10px;color: rgb(16, 14, 14);text-shadow: 0;";


include( 'vistas/layouts/stylesstartRegistro.php' );
$colorpie="color:#632a00; font-weight: bold;"
?>

<div class="container-fluid p-4 pt-0" onLoad="limpiarespacios()">
    <div class="mb-2">
      <div class="mt-4" style="font-size: 1.5rem; color:#002c00; font-weight: bold; <?php echo $color; ?>">
      <?php 
          if ( $bandera == 1 ) { ?>
          <img style="position: relative; center: 0px; top: 0px; width: 5%;" src="public/img/sistema/icon/diagnosticoa_verde.png"/>
          &nbsp;
          <?php  echo "Diagnóstico Ambiental";
          } else {?>
            <img style="position: relative; center: 0px; top: 0px; width: 5%;" src=<?php echo $image; ?> />
            &nbsp;
            <?php 
            echo "Diagnóstico Ambiental";
          }                   
        ?>
      </div>
    </div> 
  <ol class="breadcrumb mb-12 ms-12">
    <li class="breadcrumb-item"><a href="dashboard.php?activo=inicio"  style="color: #ee9528">inicio</a></li>
    <li class="breadcrumb-item active" style="color: #da9434"><a href="dashboard.php?activo=ambiente" style="color: #ee9528">Ambiente</a></li>
    <li class="breadcrumb-item active" style="color: #da9434"><a href="dashboard.php?activo=inspeccionesambiente" style="color: #ee9528">Inspecciones</a></li>
    <li class="breadcrumb-item active" style="color: #632a00"><?php echo $titulo; ?></li>
  </ol> 
  <!--<form action="" method="post" name="solicitud" id="form2">  -->
  <form action="" method="post" name="solicitud" id="form2">
    <div class="row">
      <div class="col-xl-12 mt-2"> 
        <div class="card-header" style="border: 1px solid #d4d3df; color: #549127; ">
          <div class="row p-2 pb-0 pt-0">
            <div class="col-xl-9 p-0">
              <b>DIAGNÓSTICO AMBIENTAL</b>
            </div>  
            <div class="col-xl-1">
              <label class="form-label m-0 p-0 mt-2 pt-1"></label>
            </div>           
            <div class="col-xl-2 P-0">
              <input type="text" id="diagnostico_codigo" name="diagnostico_codigo"  class="form-control" aria-describedby="passwordHelpBlock" style="background:#fff0; border:0px" >
            </div>
          </div>
        </div>        
        <div class="card mb-2">
          <div class="row mb-1 p-3 pt-1 pb-2" style="color: #632a00">
            <div class="col-xs-12 col-sm-12 col-md-4">
              <label class="form-label mt-2">Complejo</label>           
                <select id="diagnostico_complejo" name="diagnostico_complejo" class="chosen-select" >
                  <option value="0">Seleccione Complejo</option>
                  <?php
                  for ( $com = 0; $com < $c; $com++ ) { ?>
                    <option  value="<?php  echo $complejo_usuario[$com]['id_complejo']; ?>">
                      <?php echo $complejo_usuario[$com]['nombre_complejo'];    ?>
                    </option>
                  <?php 
                  } ?>
                </select>                    
            </div>   
            <div class="col-xs-12 col-sm-12 col-md-4">
              <label class="form-label mt-2">Gerencia</label>
              <select  id="diagnostico_gerencia" name="diagnostico_gerencia" class="chosen-select" onchange="llena_area()" >
                <option value="0">Seleccione Gerencia</option>
                <?php
                for ( $ger = 0; $ger < $g; $ger++ ) { ?>
                  <option  value="<?php  echo $gerencia_usuario[$ger]['id_gerencia']; ?>">
                    <?php echo $gerencia_usuario[$ger]['des_gerencia'];    ?>
                  </option>
                  <?php 
                  } ?>
              </select>                    
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
              <label for="" class="form-label mt-2">Área</label>
              <select  id="diagnostico_area" name="diagnostico_area" class="chosen-select"  onchange="actualizaarea()" required >
              <option value="0">Seleccione Área</option>
                <?php
                  for ( $area = 0; $area < $a; $area++ ) { ?>
                    <option  value="<?php  echo $area_usuario[$area]['id_area']; ?>">
                      <?php echo $area_usuario[$area]['des_area'];    ?>
                    </option>
                  <?php 
                  } ?>
              </select>               
            </div>               
          </div>
        </div>
        <div class="card mb-2">
          <div class="row mb-1 p-3 pt-1 pb-2" style="color: #632a00">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <label for="" class="form-label mt-2">Aspectos a Evaluar</label>
                <select class="chosen-select" style="text-decoration:none; text-align: center; width: 100%;" name="diagnostico_aspectos" id="diagnostico_aspectos">
                  <option value="0">Seleccione Aspecto</option>   
                  <option  value="1">Agua</option>	
                  <option  value="2">Suelo</option>
                  <option  value="3">Aire</option>
                  <option  value="4">Materiales, Sustancias o desechos Peligrosos y No Peligrosos</option>
                </select> 
            </div>  
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <label for="" class="form-label mt-2">Custodio</label>              
                <select class="chosen-select" style="text-decoration:none; text-align: center; width: 100%;"  id="disgnostico_custodio" name="disgnostico_custodio" >
                  <option value="0">Seleccione Custodio</option>   
                  <option  value="1">Custodio 1</option>	
                </select> 
            </div> 
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <label for="" class="form-label mt-2">Fecha Diagnóstico</label>              
              <input type="date" id="diagnostico_fecha" name="diagnostico_fecha"  class="form-control" aria-describedby="passwordHelpBlock" required >               
            </div>            
          </div>
        </div>
        <div class="card mb-2">
          <div class="row mb-1 p-3 pt-1 pb-2" style="color: #632a00"> 
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
              <label for="" class="form-label mt-2">Condiciones</label>              
              <input type="text" id="diagnostico_condiciones" name="diagnostico_condiciones"  class="form-control" aria-describedby="passwordHelpBlock" required >               
            </div>    
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <label class="form-label mt-2">Estatus Inspección</label>              
              <input type="text"  id="diagnostico_estatus" name="diagnostico_estatus" class="form-control" aria-describedby="passwordHelpBlock"  >               
            </div>           
          </div>
        </div>
        <!-- INICIO DE DESCRIPCION DE HALLAZGO   -->
        <div class="card mb-0 mt-2" style="color:black; "> 
          <div class="card-header m-0 p-0" style="background: #8eac971a">  
            <div class="row mb-0 p-0 m-0" style=" border: 2px solid #002c00; border-radius: 0.25rem;">
              <div class="col-xs-12 col-sm-12 col-md-12 mt-2" >
                <article style="margin-bottom: 1.8%"> <!-- TABLA UNO DE DESCRIPCION INVENTORY  -->
                  <table class="inventory mt-3 mb-5 pb-1" style="border-collapse: inherit; border:5px double #002c00; " id='tabla_detalle' >
                    <thead>
                      <tr > 
                        <input type="hidden" id="indice_hallazgo" class="indice_hallazgo"  >
                        <input type="hidden" id="indice_recomendacion" class="indice_recomendacion"  >
                        <input type="hidden" id="indice_responsable" class="indice_responsable"  >
                        <input type="hidden" id="cantidad_recomendacion" class="cantidad_recomendacion"  >
                        <input type="hidden" id="cantidad_responsable" class="cantidad_responsable"  >
                        <th style="text-decoration:none;background: #002c00; width:4%; color: #fff" >#</th>
                        <th style="text-decoration:none;background: #002c00; width:96%; color: #fff; font-size: 150%" >DESCRPCION</th>
                      </tr>
                    </thead>
                    <tbody>                      
                      <tr>
                        <td colspan=1 >
                          <a class="cut4" id="cut4" style="text-decoration:none;border: 2px solid #138034de; font-size: 170%;font-weight: bold; background:#002c00; color: white">-</a>
                          # <span style="font-size: 180%; " ></span>
                        </td>        
                        <!-- INICIO DE HALLAZGO POR RECOMENDACIONES   -->
                        <td colspan=1 style="text-decoration:none; width: 96%;background-color: #8eac971a;">  
                          <span >
                            <div >
                              <div id="padrerecomenda"  name="padrerecomenda" class="padrerecomenda">    
                                <div class="row mb-1 p-0" >   
                                  <div class="col-xs-12 col-sm-12 col-md-12 mt-2">	
                                    <select class="chosen-select" style="text-decoration:none; text-align: center; width: 100%;" name="diagnostico_hallazgo" id="diagnostico_hallazgo">
                                      <option value="0">Seleccione Hallazgo</option>   
                                      <option  value="1"> Hallazgo W1   </option>	
                                    </select> 
                                  </div>                                
                                </div>
                                <!-- INICIO DE DESCRIPCION DE RECOMENDACIONES   -->
                                <div style="margin: 1.8%; margin-bottom: 3%; padding:1%; "  id="tabla_recomendaciones" name="tabla_recomendaciones" class="tabla_recomendaciones">   
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >		
                                    <div class="row" style="background: #549127;border: 1px double #212d21e0;color: white;font-size: 120%;font-weight: bold;border-radius: 0.2em;" > 	  
                                      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style=" text-decoration: none;font-size: 150%;color: white;">#</div>	  
                                      <div class="col-md-11 col-xs-11 col-lg-11" style="background: #549127" >	RECOMENDACION</div>	  
                                    </div>	
                                    <div id="fila_recomendaciones" class="fila_recomendaciones"> 
                                      <div name="div_recomendaciones" id="div_recomendaciones" class="div_recomendaciones"> 
                                        <div style="background: #fff; border:1px solid rgba(0, 0, 0, 0.125)"  id="recomendaciones" name="recomendaciones" class="row recomendaciones"> 
                                          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">	
                                            <a class="cut5" id="cut5" name="cut2" style="position: relative;text-decoration:none;border: 1px solid #138034de; font-size: 150%;font-weight: bold; background:#549127; color: white">-</a>
                                            <span style="font-size: 130%; " ></span>
                                          </div>
                                          <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" >
                                            <input type="text" style="height: 100%;" name="diagnostico_recomendacion" id="diagnostico_recomendacion" >
                                          </div>
                                        </div>
                                      </div>                                        
                                    </div>
                                  </div>
                                </div>   <!-- FIN DE DESCRIPCION DE RECOMENDACIONES   -->
                                <div class="row prueba" id="prueba" name="prueba"style="font-size: 80%; font-weight: bold;" > 
                                  <div class="col-md-6 col-xs-6 col-lg-6" style=" text-decoration: none;color: white; text-align: left;">
                                    <a class="add5" id="add5" name="add5" style="text-decoration:none; border: 1px solid #138034de; font-size: 180%;font-weight: bold; background:#549127; color: white; border-radius: 0.5em;">+</a> 
                                  </div>                                  
                                </div>                                
                              </div>    
                            </div>  <!-- FIN DE HALLAZGO POR RECOMENDACIONES   -->     
                          </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <a class="agregar4" style="text-decoration:none; text-decoration:none;border: 2px solid #138034de; font-size: 150%;font-weight: bold; background:#002c00; color: white">+</a> 
                </article>             
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-0 mt-2">
        <div class="card-header" style="color: #549127; "> <b>&nbsp;ADJUNTAR SOPORTES </b></div>
          <div class="row mb-0 p-0 m-0 pt-0 pb-1">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-0" class="text-center" 
              style=" padding-top:0.5%; padding-bottom: 1%">
              <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
              <input name="archivo" id="archivo" type="file" class="form-control" style="font-size:0.8em; margin-top:1%; margin-bottom: 1.5%" />
            </div>                                    
          </div>
        </div>
        <?php if ($bandera==1){  //  ES UN REGISTRO NUEVO   ?>
        <div class="row mt-4 text-center m-0 p-0 mb-2 mb-5">
          <div class="col-xl-2"> </div>         
          <div class="col-xl-4 ">
            <button type="button" class="btn mb-2"  onclick="guardarinspeccionAHO_diagnostico();" style="min-width: 100%; width: 100%;  max-width: 100%; background-color: #632a00; color: white"> <i class="fa fa-fast-forward"></i>&nbsp;&nbsp;Registrar</button>
          </div>
          <div class="col-xl-4"> <a rel="tooltip"  title=" Cancelar " id="Cancelar"  href="dashboard.php?activo=inspeccionesambiente" class="btn" style="min-width: 100%; width: 100%;  max-width: 100%; background-color: #632a00; color: white"> <i class="fa fa-undo"></i> Cancelar </a> </div>
          <div class="col-xl-2"> </div>
        </div>
        <?php } ?>
        <?php 
        if ($bandera==2){ 
          include( 'funciones/enlacesRegistro.php' );                  
          //  VISUALIZAR REGISTRO   ?>
          <div class="row mt-4 text-center m-0 p-0 mb-2">
            <div class="col-xl-1"> </div>
            <div class="col-xl-3 ">       </div>
            <div class="col-xl-3 "> 
              <a rel="tooltip"  title=" Cancelar " id="Cancelar" href="<?php echo $enlaceR; ?>"  class="btn" style="min-width: 100%; width: 100%;  max-width: 100%; background-color: #632a00; color: white"> <i class="fa fa-undo"></i> Regresar </a> 
            </div>
            <div class="col-xl-2"> </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </form>
</div><br/><br/><br/><br/>
<?PHP include( 'vistas/layouts/jsstartRegistro.php' ); 
include( 'vistas/layouts/ambiente/jsstartAmbiente.php' ); 
 ?>