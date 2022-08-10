<?php
if ( !isset( $_SESSION ) ) {
  session_start();
}

include_once( 'funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php' );
include_once( 'funciones/funcionesGenerales/funcionesGenerales.php' );

$fecha_actual = date( 'Y-m-d' );
$activo='A';
if ( isset( $_GET[ 'id_usu' ] ) ) {
  $id_usu = $_GET[ 'id_usu' ];
  //$ger_usu = $_GET[ 'ger_usu' ];
} else {
  $id_usu = '';
  $ger_usu='';
}
if ( isset( $_GET[ 'act_usu' ] ) ) {
  $act_usu2 = $_GET[ 'act_usu' ];
} else {
  $act_usu2 = '';
}

$id_userAdmon = $_SESSION[ 'id_user' ];
$fecha_actual = date( 'Y-m-d' );

if ( isset( $_GET[ 'ced_usu' ] ) ) {
  $ced_usu = $_GET[ 'ced_usu' ];
} else {
  $ced_usu = '';
}

if ( isset( $_GET[ 'mod' ] ) ) {
  $mod = $_GET[ 'mod' ];
} else {
  $mod = 1;
}

//include( 'funciones/funcionesGenerales/cargaUsuario.php' );
if ( $mod == 1 ) {
  $ced_usu = "";
  $id_usu = "";
  $npe_usu = "";
  $nom_usu = "";
  $ape_usu = "";
  $car_usu = "";
  $tel_usu = "";
  $cor_usu = "";
  $log_usu = "";
  $sal_usu2 = "";
  $rol_usu2 = "";
  $com_usu2 = "";
  $ger_usu2="";
}
//echo $usuarios_act_usu_m[1]['des_status'];
?>
<div class="container-fluid px-12">
  <div class="mb-2">
    <div class="mt-4" style="font-size: 1.75rem; color: #3e3e8c; font-weight: bold;">
      <?php 
          if ( $mod == 1 ) { ?>
          <img style="position: relative; center: 0px; top: 0px; width: 5%;" src="public/img/sistema/registroazuloscuro.png"/>
          &nbsp;
          <?php  echo "Crear Registro";
          } else {?>
            <img style="position: relative; center: 0px; top: 0px; width: 5%;" src="public/img/sistema/icon/cusuarios"/>
            &nbsp;
            <?php 
            echo "Editar Registro";
          }                   
        ?>
      </div>
    </div> 

  <ol class="breadcrumb mb-12 ms-12">
    <li class="breadcrumb-item"><a href="dashboard.php?activo=inicio">Inicio</a></li>
    <li class="breadcrumb-item"><a href="dashboard.php?activo=admon_usu&filtro=A">Gestión de Usuarios</a></li>
    <li class="breadcrumb-item active">
      <?php
      if ( $mod == 1 ) {
        echo "Agregar Usuario";
      } else {
        echo "Editar Usuario";
      }
      ?>
    </li>
  </ol>
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
              <input type="text" id="cedula_usuario" name="cedula_usuario" class="form-control" value="<?php echo @$cedula_usuario;?>" required 
              onKeyPress="return solo_num(event)" onChange="sap1();">
            </div>
            <div class="col-xl-2">
              <label for="" class="form-label mt-2">Nro Personal </label>
              <input type="text" id="npersonal" name="npersonal" class="form-control" value="<?php echo @$npersonal;?>" required
              onKeyPress="return solo_num(event)">
            </div>
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Cargo </label>
              <input type="text" id="cargo_usuario" name="cargo_usuario" class="form-control" value="<?php echo @$cargo_usuario;?>" required style="text-transform:uppercase;" onchange="conMayusculas(this);">
            </div>
            <div class="col-xl-2">
              <label for="" class="form-label mt-2">Teléfono </label>
              <input type="text" id="telefono_usuario" name="telefono_usuario" class="form-control" value="<?php echo @$telefono_usuario;?>" required onKeyPress="return solo_num(event)" maxlength="11"> 
            </div>
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Correo</label>
              <input type="email" id="correo_usuario" name="correo_usuario" class="form-control" value="<?php echo @$correo_usuario;?>" placeholder="me@example.com" onchange="ValidateEmail(document.form1.cor_usu)" required>
            </div>
          </div>
          <div class="row p-2 pt-0 m-0 small">
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Nombre </label>
              <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" aria-describedby="passwordHelpBlock"  value="<?php echo @$nombre_usuario;?>" required style="text-transform:uppercase;" onchange="conMayusculas(this);">
            </div>
            <div class="col-xl-3">
              <label for="" class="form-label mt-2">Apellido </label>
              <input type="text" id="apellido_usuario" name="apellido_usuario" class="form-control" aria-describedby="passwordHelpBlock"  value="<?php echo @$apellido_usuario;?>" required style="text-transform:uppercase;"  onchange="conMayusculas(this);" >
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
                
                <?php  
                
                echo $combo_rol=construye_combo_simple( "id_rol", @$id_rol, "id_rol", "des_rol", "form-control", "dm_rol", "", " style='width: 100%' onChange='actualiza_usuario();' " );
                ?>
                
             
            </div>
            <div class="col-xl-6">                            
                <label for="" class="form-label mt-2">Activo</label>
             
               <?php  
                
                echo $combo_activo=construye_combo_simple( "activo", @$activo, "estatus_id", "des_estatus", "form-control", "dm_estatus", "", " style='width: 100%' onChange='actualiza_usuario()' " );
                ?>
              
              </div>
          </div>
        </div>
        <div class="card mb-12 mt-4">
          <div class="card-header text-danger"> <i class="fas fa-check-square"></i> &nbsp;<b>DATOS DE LA GERENCIA</b> </div>
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
              <label for="" class="form-label mt-2">Gerencia  </label>
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
              <label for="" class="form-label mt-2">Area</label>
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
        <div class="row mt-4 text-center m-0 p-0 mb-2">
          <div class="col-xl-4 "> </div>
          <div class="col-xl-2 ">
            <button type="submit" name="agregar" class="btn btn-primary mb-2" style="min-width: 150px; width: 150px;  max-width: 150px;"> <i class="fa fa-plus-square"></i>
            <?php
            if ( $id_usu != '' ) {
              echo "Editar";
            } else {
              echo "Agregar";
            }
            ?>
            </button>
          </div>
          <div class="col-xl-2 ">
            <a rel="tooltip"  title=" Cancelar " id="Cancelar" href="dashboard.php?activo=admon_usu&filtro=A"  class="btn btn-primary mb-2" style="min-width: 150px; width: 150px;  max-width: 150px;">
              <i class="fa fa-undo"></i> 
              Cancelar
            </a>     
          </div>

        </div>
          <input type="hidden" name="id_usu" id="id_usu" value="<?php echo $id_usu;?>"/>
          <input type="hidden" name="mod" id="mod"  value="<?php echo $mod;?>"/>
          <input type="hidden" name="actselec" id="actselec" />
          <input type="hidden" name="salselec" id="salselec" />
          <input type="hidden" name="rolselec" id="rolselec" />
          <input type="hidden" name="comselec" id="comselec" />
          <input type="hidden" name="gerselec" id="gerselec" />
          <input type="hidden" name="areselec" id="areselec" />
          <input type="hidden" name="ger_usu_s" id="ger_usu_s" value="<?php echo $ger_usu_s;?>" />
          <div class="col-xl-4 "> </div>
        </div>
      </form>
    </div>
  </div>
<?php include_once( 'funciones/administracion/scriptsUsuarios.php' );?>