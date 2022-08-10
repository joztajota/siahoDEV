<?php
if ( !isset( $_SESSION ) ) {
  session_start();
}
$enlaceR="dashboard.php?activo=inicio";
include( 'funciones/conecciones/MariaDB/connsisgm.php' );

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

$image="public/img/sistema/eventosambientales.png";
include( 'funciones/enlaces.php' );

include( 'funciones/cargaFormulario.php' );
include( 'vistas/layouts/stylesstartRegistro.php' );
?>

<div class="container-fluid p-4 pt-0" onLoad="limpiarespacios()">
    <div class="mb-2">
      <div class="mt-4" style="font-size: 1.75rem; color: #3e3e8c; font-weight: bold; <?php echo $color; ?>">
      <?php 
          if ( $bandera == 1 ) { ?>
          <img style="position: relative; center: 0px; top: 0px; width: 5%;" src="public/img/sistema/gsi.png"/>
          &nbsp;
          <?php  echo "Crear Registro";
          } else {?>
            <img style="position: relative; center: 0px; top: 0px; width: 5%;" src=<?php echo $image; ?> />
            &nbsp;
            <?php 
            echo "Ver Registro";
          }                   
        ?>
      </div>
    </div> 
  <ol class="breadcrumb mb-12 ms-12">
    <?php echo $enlace2; ?>
  </ol>
  <!--<form action="" method="post" name="solicitud" id="form2">  -->
  <form action="" method="post" name="solicitud" id="form2">
    <div class="row">
      <div class="col-xl-12 mt-2">
      <?php if ($bandera!=1)  {     ?>
        <!-- SI ES ANALISTA   ------>
        <div class="card-header text-danger" style="border: 1px solid #d4d3df;">
          <div class="row p-2 pb-0 pt-0">
            <div class="col-xl-9 p-0 mb-2">
              <b>DATOS DEL REGISTRO</b>
            </div>  
            <div class="col-xl-3" style="text-align: end;">
              <?php               
               if ($bandera==1){ ?>
                  <label type="date" class="form-control" aria-describedby="passwordHelpBlock" disabled style="background-color: #fff0; border:0; text-align: end; font-weight: bold;">
                    <?php echo $fecha_actual;  ?>
                  </label>  
               <?php }  ?>

               <?php               
               if ($bandera==2){ ?>
                  <a href="dashboard.php?activo=detalleaspirante&bandera=9&registro_codigo=<?php echo trim($registro_codigo_m)?>" style="color: #b9935a" >
                      <img style="position: relative; center: 0px; top: 0px; width: 20%;" src="public/img/sistema/verdetalleRojo.png"/>
                  </a>
               <?php }  ?>
            </div>           
          </div>
        </div>
        <div class="card mb-2 mt-2">
          <div class="row p-3 pt-0" style="color:black">
            <div class="col-xl-2">
              <label class="form-label m-0 p-0 mt-2 pt-1">Código </label>
              <input type="text" id="registro_codigo_vista" name="registro_codigo_vista"  class="form-control" aria-describedby="passwordHelpBlock"  
              value="<?php echo $registro_codigo_m;  ?>"  disabled >
            </div>
            <div class="col-xl-2">
              <label class="form-label mt-2">Creado</label>
              <input type="text" id="registro_fechacrea_vista" name="registro_fechacrea_vista" class="form-control" aria-describedby="passwordHelpBlock"  
              value="<?php 
                $registro_fechacrea_m = date_create( $registro_fechacrea_m );
                $registro_fechacrea_m = date_format( $registro_fechacrea_m, "d/m/Y" );
               echo $registro_fechacrea_m;
               ?>" disabled >
            </div>
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Estatus</label>
              <input type="text" id="registro_status_vista" name="registro_status_vista" class="form-control" aria-describedby="passwordHelpBlock" 
              value="<?php echo $registro_status_m; ?>" disabled >
            </div>
            <div class="col-xl-3">
              <label class="form-label mt-2">PCP </label>
              <input type="text" id="registro_validaPCP_vista" name="registro_validaPCP_vista" class="form-control" aria-describedby="passwordHelpBlock" 
                value="<?php echo $registro_validaPCP_m; ?>" disabled >
            </div>
            <div class="col-xl-2">
              <label class="form-label mt-2">SALUD </label>
              <input type="text" id="registro_validaSalud_vista" name="registro_validaSalud_vista" class="form-control" aria-describedby="passwordHelpBlock" 
              value="<?php echo $registro_validaSalud_m; ?>" disabled >
            </div>
          </div>
        </div>
      <?php }  ?>
  <!--
  <div class="row">
    <div class="col-xl-12">
      <form action="vistas/crearmodifusu.php" method="post" name="form1" >
        <div class="card mb-12">
          <div class="card mb-2">
            <div class="card-header text-danger"> <i class="fa fa-user" aria-hidden="true"></i> &nbsp;<b>DATOS PERSONALES</b> </div>
          </div>
          <div class="row p-2 pt-0 m-0 small">
            <div class="col-xl-2">
              <label for="" class="form-label mt-2">Cédula </label>
              <input type="text" id="ced_usu" name="ced_usu" class="form-control" value="<?php echo $ced_usu;?>" required 
              onKeyPress="return solo_num(event)">
            </div>
            <div class="col-xl-2">
              <label for="" class="form-label mt-2">Nro Personal </label>
              <input type="text" id="npe_usu" name="npe_usu" class="form-control" value="<?php echo $npe_usu;?>" required
              onKeyPress="return solo_num(event)">
            </div>
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Cargo </label>
              <input type="text" id="car_usu" name="car_usu" class="form-control" value="<?php echo $car_usu;?>" required style="text-transform:uppercase;" onchange="conMayusculas(this);">
            </div>
            <div class="col-xl-2">
              <label for="" class="form-label mt-2">Teléfono </label>
              <input type="text" id="tel_usu" name="tel_usu" class="form-control" value="<?php echo $tel_usu;?>" required onKeyPress="return solo_num(event)" maxlength="11"> 
            </div>
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Correo</label>
              <input type="email" id="cor_usu" name="cor_usu" class="form-control" value="<?php echo $cor_usu;?>" placeholder="me@example.com" onchange="ValidateEmail(document.form1.cor_usu)" required>
            </div>
          </div>
          <div class="row p-2 pt-0 m-0 small">
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Nombre </label>
              <input type="text" id="nom_usu" name="nom_usu" class="form-control" aria-describedby="passwordHelpBlock"  value="<?php echo $nom_usu;?>" required style="text-transform:uppercase;" onchange="conMayusculas(this);">
            </div>
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Apellido </label>
              <input type="text" id="ape_usu" name="ape_usu" class="form-control" aria-describedby="passwordHelpBlock"  value="<?php echo $ape_usu;?>" required style="text-transform:uppercase;"  onchange="conMayusculas(this);" >
            </div>
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Login </label>
              <input type="text" id="log_usu" name="log_usu" class="form-control" aria-describedby="passwordHelpBlock"  value="<?php echo $log_usu;?>" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"   >
            </div>
            <div class="col-xl-3"></div>
          </div>
        </div>
        <div class="card mb-12 mt-4">
          <div class="card-header text-danger"> <i class="fas fa-check-square"></i> &nbsp;<b>PERMISOLOGÍA</b> </div>
          <div class="row p-2 pt-0 m-0 small">
            <div class="col-xl-6">
              <label for="" class="form-label mt-2">Rol</label>
              <select  id="rol_usu" name="rol_usu" class="form-control" onchange="actualizarol()" >
                <?php
                for ( $k = 0; $k < $cantroles; $k++ ) {                ?>
                  <option  value="<?php  echo $rol_usuario[$k]['id_rol']; ?>">
                    <?php echo $rol_usuario[$k]['des_rol'];    ?>
                  </option>
                <?php  } ?>
              </select>
            </div>
            <div class="col-xl-6">                            
                <label for="" class="form-label mt-2">Activo</label>
                <select  id="act_usu" name="act_usu" class="form-control" onchange="actualizaactivo()" required >
               <?php  
                for ( $r = 0; $r < $i; $r++ ) { ?>
                  <option  value="<?php  echo $estatus_usuario[$r]['id_status']; ?>">
                    <?php echo $estatus_usuario[$r]['des_status'];    ?>
                  </option>
                <?php 
                } ?>
                </select>
              </div>
          </div>
        </div>
              -->
        
         
          <li class="nav-item">
           <a class="nav-link active" href="dashboard.php?activo=reportarDiagAHO&filtro=A">Recomendaciones</a>
           </li>
           
            </ul>        

        <div class="card mb-12 mt-4">
          <div class="card-header text-danger"> <i class="fas fa-check-square"></i> &nbsp;<b>DATOS DE LA PLANTA</b> </div>
          <div class="row p-2 pt-0 m-0 small">
            <div class="col-xl-4">
              <label for="" class="form-label mt-2">Complejo</label>
              <select  id="com_usu" name="com_usu" class="chosen-select" onchange="actualizacomplejo()" >
                <?php
                for ( $com = 0; $com < $c; $com++ ) { ?>
                  <option  value="<?php  echo $complejo_usuario[$com]['id_complejo']; ?>">
                    <?php echo $complejo_usuario[$com]['nombre_complejo'];    ?>
                  </option>
                <?php 
                } ?>
                </select>
            </div>
            <div class="col-xl-4">
              <label for="" class="form-label mt-2">Planta  </label>
              <select  id="ger_usu" name="ger_usu" class="chosen-select" onchange="llena_area()" >
                <?php
                for ( $ger = 0; $ger < $g; $ger++ ) { ?>
                  <option  value="<?php  echo $gerencia_usuario[$ger]['id_gerencia']; ?>">
                    <?php echo $gerencia_usuario[$ger]['des_gerencia'];    ?>
                  </option>
                <?php 
                } ?>
                </select>
            </div>
            <div class="col-xl-4">
              <label for="" class="form-label mt-2">Area/Sección</label>
              <select  id="are_usu" name="are_usu" class="chosen-select"  onchange="actualizaarea()" required >
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
        <div class="card mb-0 mt-2" style="color:black">
          <div class="card-header text-danger"> &nbsp;&nbsp;<b> REPORTE INSPECCIONES SUGURIDAD INDUSTRIAL              
            <?php if ($bandera==1){  ?> 
            <input type="text" name="clasificacionSeleccionada" id="clasificacionSeleccionada" style="width: 50%;;font-weight: bolder; border:0; color: #dc3545; background: transparent;" disabled />
            <?php }  ?>

            <?php if ($bandera==2){  ?> 
            <input type="text" name="clasificacionSeleccionada" id="clasificacionSeleccionada" style="width: 50%;;font-weight: bolder; border:0; color: #dc3545; background: transparent;" value="<?php echo $aspirante_Clasificacion_m; ?>" disabled />
            <?php }  ?>
          </b> </div>
          <div class="row mb-0 p-0 m-0">
            <div class="col-xl-12 mt-2">
              <?php if ($bandera==1) {  // Creando Registro      ?>
              <article style="margin-bottom: 1.8%">
                <table class="inventory" style="border-collapse: inherit;" id='tabla_detalle' >
                  <thead>
                    <tr >
                    <th colspan=1  style="background: #c1c7d7;">#</th>
                      <th colspan=4  style="background: #c1c7d7;">EQUIPO A EVALUAR</th>
                      <th colspan=4  style="background: #c1c7d7;">CONDICIONES DETECTADAS</th>
                      <th colspan=4  style="background: #c1c7d7;">RECOMENDACIONES</th>
                      <th colspan=5  style="background: #c1c7d7;">OBSERVACIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan=1 style="text-decoration:none"><a class="cut" style="text-decoration:none">-</a><span ></span></td>
                      <td colspan=4 ><span ><input name="experiencia_ente_o_empresa[]" id="experiencia_ente_o_empresa" style="text-transform:uppercase;" /></span></td>
                      <td colspan=4 ><span ><input name="experiencia_ente_o_empresa[]" id="experiencia_ente_o_empresa" style="text-transform:uppercase;" /></span></td>
                      <td colspan=4 ><span ><input name="experiencia_ente_o_empresa[]" id="experiencia_ente_o_empresa" style="text-transform:uppercase;" /></span></td>
                      <td colspan=5 ><span ><input name="experiencia_lugar_oficio[]" id="experiencia_lugar_oficio" style="text-transform:uppercase;" /></span></td>
                      <td hidden="hidden"><input type="hidden" name="carticulo[]" id="carticulo[]" value="" /></td>
                    </tr>
                  </tbody>
                </table>
                <a class="add" style="text-decoration:none">+</a> </article>
             <?php } 
             if ($bandera==2){  // mostrar datos     ?>
              <article style="margin-bottom: 1.8%">
                <table class="inventory" style="border-collapse: inherit;" id='tabla_detalle' >
                  <thead>
                    <tr >
                    <th colspan=1  style="background: #c1c7d7;">#</th>
                    <th colspan=4  style="background: #c1c7d7;">ASPECTO A EVALUAR</th>
                    <th colspan=4  style="background: #c1c7d7;">CONDICIONES DETECTADAS</th>
                    <th colspan=4  style="background: #c1c7d7;">NORMATIVA APLICABLE</th>
                    <th colspan=5  style="background: #c1c7d7;">OBSERVACIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php echo $imprime_linea = imprime_fila(2,$registro_codigo_m);?>            
                  </tbody> 
                </table>
                </article>
              <?php } ?>
          </div>
        </div>
      </div>

      <?php if ($bandera==1){        ?>     

      <div class="card mb-0 mt-2">
        <div class="card-header text-danger"> &nbsp;&nbsp;<b> ADJUNTAR SOPORTES </b> </div>
        <div class="row mb-0 p-0 m-0 pt-4 pb-4">
            <div class="col-xl-1 ">
              <label >Archivo</label>
            </div>
            <div class="col-xl-5 ">
              <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
              <input name="archivo" id="archivo" type="file" />
            </div>       
            <div class="col-xl-2">
            </div> 
        </div>
      </div>
      <?php } ?>

      <?php if ($bandera==1){  //  ES UN REGISTRO NUEVO   ?>
      <div class="row mt-4 text-center m-0 p-0 mb-2">
        <div class="col-xl-2"> </div>         
        <div class="col-xl-2 ">
          <button type="button" class="btn btn-primary mb-2"  onclick="guardar();" style="min-width: 100%; width: 100%;  max-width: 100%;"> <i class="fa fa-fast-forward"></i>&nbsp;&nbsp;Registrarse</button>
        </div>
        <div class="col-xl-2"> <a rel="tooltip"  title=" Cancelar " id="Cancelar"  href="dashboard.php?activo=sp"  class="btn btn-primary" style="min-width: 100%; width: 100%;  max-width: 100%;"> <i class="fa fa-undo"></i> Cancelar </a> </div>
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
            <a rel="tooltip"  title=" Cancelar " id="Cancelar" href="<?php echo $enlaceR; ?>"  class="btn btn-primary" style="min-width: 100%; width: 100%;  max-width: 100%;"> <i class="fa fa-undo"></i> Regresar </a> 
          </div>
          <div class="col-xl-2"> </div>
        </div>
      <?php } ?>

    </div>
         
    <?PHP include( 'vistas/layouts/jsstartRegistro.php' );  ?>   