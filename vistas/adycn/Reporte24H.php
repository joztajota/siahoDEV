<?php
if (!isset($_SESSION)) {
        session_start();
}

$enlaceR = "dashboard.php?activo=inicio";
include('funciones/funcionesgenerales/conecciones/MariaDB/connsisgm.php');
include('vistas/layouts/stylesstartRegistro.php');

/***************llamado servicio */
require_once ('funciones/wsdl/clases/consumoApi.class.php');
/* EJEMPLO PARA EL GET */

//WS datos empleado
$token = '5adb40fdd6f8eb4fd0523376538eb533';
$URL	= 'http://localhost/siaho/funciones/wsdl/empleados?NumPersonal=13336768';
$rs 	= API::GET($URL,$token);
$array  = API::JSON_TO_ARRAY($rs);
$user = $array;
$reporte24h= $user;

$preCargaComplejo_id=$user[0]['complejoId'];

/* Ws  datos repoets24h */
$token = '5adb40fdd6f8eb4fd0523376538eb533';
$URL	= "http://localhost/siaho/funciones/wsdl/r24h?preCargaComplejo_id=$preCargaComplejo_id";
$rs 	= API::GET($URL,$token);
$array  = API::JSON_TO_ARRAY($rs);
$reporte24h= $array;
//print_r($reporte24h);die;
/******* */

$fecha_actual = date('d/m/Y');
$hereg = date("h:i:A");

$color = "";
if (isset($_REQUEST["bandera"])) { // readonly =2
        $bandera = $_REQUEST["bandera"];  //Ver Registro 
} else {
        $bandera = 1;  //Crear Registro
}

$image = "public/img/sistema/ADyCN.jpg";

?>
<!--  Header -->
<div class="container-fluid p-4 pt-0" onLoad="limpiarespacios()">
        <div class="mb-2">
                <div class="mt-4" style="font-size: 1.75rem; color: #3e3e8c; font-weight: bold; <?php echo $color; ?>">
                        <?php
                        if ($bandera == 1) { ?>
                                <img style="position: relative;  top: 0px; width: 5%;" src="public/img/sistema/icon/r24h.png" />
                                &nbsp;
                        <?php echo "Crear Registro";
                        } else { ?>
                                <img style="position: relative; center: 0px; top: 0px; width: 5%;" src=<?php echo $image; ?> />
                                &nbsp;
                        <?php
                                echo "Ver Registro";
                        }
                        ?>
                </div>
        </div>
   <!--  Body formulario -->     
    
        <form action="" method="post" name="solicitud" id="form2">
                <div class="row">
                        <div class="col-xl-12 mt-2">
                                
                
 
                                <!--  titulo del header -->
                                <div class="card mb-0 mt-2" style="color:black">
                                        <!--  titulo del header -->
                                        <div class="card-header text-danger"> &nbsp;&nbsp;<b> Reporte 24 HORAS
                                                        <?php if ($bandera == 1) {  ?>
                                                                <input type="text" name="clasificacionSeleccionada" id="clasificacionSeleccionada" style="width: 50%;;font-weight: bolder; border:0; color: #dc3545; background: transparent;" disabled />
                                                        <?php }  ?>
                                                        <?php if ($bandera == 2) {  ?>
                                                                <input type="text" name="clasificacionSeleccionada" id="clasificacionSeleccionada" style="width: 50%;;font-weight: bolder; border:0; color: #dc3545; background: transparent;" value="<?php echo $aspirante_Clasificacion_m; ?>" disabled />
                                                        <?php }  ?>
                                                </b>
                                        </div>
                                        <!--  contenido  del header -->
                                        <div class="row mb-0 p-2 m-4">
                                                <div class="col-x2-12 mt-2">
                                                        <?php if ($bandera == 1) {  // Creando Registro      
                                                        ?>
                                                                <article style="margin-bottom: 1.8%">
                                                                        <table class="inventory" style="border-collapse: inherit;" id='tabla_detalle'>
                                                                                <div class="row p-2 pt-0 m-0 small">
                                                                                        <div class="col-xl-4">
                                                                                                <label for="" class="form-label mt-2">Hora de Turno</label>
                                                                                                <div class="form-check">
                                                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                                                        <label class="form-check-label" for="flexRadioDefault1">Turno de 07:00 a
                                                                                                                17:00
                                                                                                        </label>
                                                                                                </div>
                                                                                                <div class="form-check">
                                                                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                                                                        <label class="form-check-label" for="flexRadioDefault2">Turno de 17:00 a
                                                                                                                07:00
                                                                                                        </label>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-xl-4">
                                                                                                <label for="" class="form-label mt-2">Supervisor</label>
                                                                                                <select id="ger_usu" name="ger_usu" class="chosen-select" onchange="llena_area()">

                                                                                                </select>
                                                                                        </div>
                                                                                </div>
                                                                        </table>


                                                                <?php }
                                                        if ($bandera == 2) {  // mostrar datos     
                                                                ?>
                                                                        <article style="margin-bottom: 1.8%">
                                                                                <table class="inventory" style="border-collapse: inherit;" id='tabla_detalle'>
                                                                                        <thead>

                                                                                                <?php echo $imprime_linea = imprime_fila(2, $registro_codigo_m); ?>
                                                                                                </tbody>
                                                                                </table>
                                                                        </article>
                                                                <?php } ?>
                                                </div>
                                        </div>
                                </div>

                                <?php if ($bandera == 1) { ?>

                                        <div class="card mb-12 mt-4">
                                                <!--  titulo del body -->
                                                <div class="card-header text-danger"> <i class="fas fa-check-square"></i> &nbsp;<b>NOVEDADES DIARIAS
                                                                ADyCN</b> </div>

                                                        <!--Lista de tab -->
                                                        <div class="row p-2 pt-0 m-0 small">
                                                                
                                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                                        <?php
                                                                         // [0] => Array ( [tabs] => Array ( [R24HTabsId] 
                                                                         foreach($reporte24h as $tabs){
                                                                             // print_r($tabs['tabs']['R24HTabsId']);die;
                                                                              echo " <li class='nav-item' role='presentation'>
                                                                              <button 
                                                                                        class='nav-link active' id='tabs-".$tabs['tabs']['R24HTabsId']."' 
                                                                                        data-bs-toggle='pill' 
                                                                                        data-bs-target='#pills-home' 
                                                                                        type='button' role='tab' 
                                                                                        aria-controls='pills-home' 
                                                                                        aria-selected='true'><b>".$tabs['tabs']['descripcion']."</b>
                                                                                </button>
                                                                              </li> ";   
                                                                              
                                                                              
                                                                              
                                                                                }
                                                                        ?>
                                                                </ul>
                                                                <?php
                                                                 foreach($reporte24h as $tabs)
                                                                 {
                                                                        ?>
                                                                        <div class='tab-content' id='pills-tabContent'>
                                                                                  <div class='tab-pane fade show active' id='<?php echo "tabs-".$tabs['tabs']['R24HTabsId'];?>' role='tabpanel' aria-labelledby='pills-home-tab'>
                                                                                          <div class='container-fluid mt-3'>
                                                                                                  <div class='row'>
                                                                                                          <div class='col-sm-1 p-3  text-white'></div>
                                                                                                          <div class='col-sm-1 p-3  text-white'></div>
                                                                                                          <div class='col-sm-1 p-3 bg-primary text-white text-center'><b>Si</b></div>
                                                                                                          <div class='col-sm-1 p-3 bg-primary text-white text-center'><b>No</b></div>
                                                                                                          <div class='col-sm-1 p-3 bg-primary text-white text-center'><b>Observaciones</b></div>
                                                                                                  </div>
                                                                                                 <?php
                                                                                                  foreach($tabs['TabsEquipos'] as $tabsEquipo){
                                                                                                         // print_r($tabsEquipo['equipoId'] );
                                                                                                         // print_r($tabsEquipo['nombre'] );die;
                                                                                                         ?> 
                                                                                                        <div class='row'>                                                                                                               
                                                                                                                <div class='col-sm-2 p-3 bg text-black'><?php echo $tabsEquipo['nombre']; ?></div>
                                                                                                                <div class='col-sm-1 p-3 bg text-white text-center'><input type='radio' id='<?php echo "Res-".$tabs['tabs']['R24HTabsId']."-".$tabsEquipo['equipoId'];?>' class='form-radio validate[required, requireEveryRow]' name='<?php echo "Res-".$tabs['tabs']['R24HTabsId']."-".$tabsEquipo['equipoId'];?>' value='Si' aria-labelledby='label_9_col_1 label_9_row_2' /></div>
                                                                                                                <div class='col-sm-1 p-3 bg text-white text-center'><input type='radio' id='<?php echo "Res-".$tabs['tabs']['R24HTabsId']."-".$tabsEquipo['equipoId'];?>' class='form-radio validate[required, requireEveryRow]' name='<?php echo "Res-".$tabs['tabs']['R24HTabsId']."-".$tabsEquipo['equipoId'];?>' value='No' aria-labelledby='label_9_col_1 label_9_row_2' /></div>
                                                                                                                <div class='col-sm-4 p-3 bg text-white'><input type='text'id='<?php echo "Obser-".$tabs['tabs']['R24HTabsId']."-".$tabsEquipo['equipoId'];?>' class='form-textbox validate[required, requireEveryRow]' size='80' name='<?php echo "Observacion_".$tabs['tabs']['R24HTabsId']."-".$tabsEquipo['equipoId'];?>' style='width:100%;box-sizing:border-box' value='' aria-labelledby='label_9_col_3 label_9_row_2' /></div>
                                                                                                        </div>     
                                                                                                          
                                                                                                  <?php  
                                                                                                          }
                                                                                                  ?>
                                                                                          </div>
                                                                                  </div>
                                                                          </div>
                                                                <?php } ?>       
                                                        </div>
                                                </div>


                                <?php } ?>

                                        <?php if ($bandera == 1) {  //  ES UN REGISTRO NUEVO   
                                        ?>
                                                <div class="row mt-4 text-center m-0 p-0 mb-2">
                                                        <div class="col-xl-2"> </div>
                                                        <div class="col-xl-2 ">
                                                                <button type="button" class="btn btn-primary mb-2" onclick="guardar();" style="min-width: 100%; width: 100%;  max-width: 100%;"> <i class="fa fa-fast-forward"></i>&nbsp;&nbsp;Registrar</button>
                                                        </div>
                                                        <div class="col-xl-2"> <a rel="tooltip" title=" Cancelar " id="Cancelar" href="dashboard.php?activo=inicio" class="btn btn-primary " style="min-width: 100%; width: 100%;  max-width: 100%;"> <i class="fa fa-undo"></i>
                                                                        Cancelar </a> </div>
                                                        <div class="col-xl-2"> </div>
                                                </div>
                                        <?php } ?>

                                        <?php
                                        if ($bandera == 2) {
                                                include('funciones/enlacesRegistro.php');
                                                //  VISUALIZAR REGISTRO   
                                        ?>
                                                <div class="row mt-4 text-center m-0 p-0 mb-2">
                                                        <div class="col-xl-1"> </div>
                                                        <div class="col-xl-3 "> </div>
                                                        <div class="col-xl-3 ">
                                                                <a rel="tooltip" title=" Cancelar " id="Cancelar" href="<?php echo $enlaceR; ?>" class="btn btn-primary" style="min-width: 100%; width: 100%;  max-width: 100%;"> <i class="fa fa-undo"></i> Regresar </a>
                                                        </div>
                                                        <div class="col-xl-2"> </div>
                                                </div>
                                        <?php } ?>

                                        </div>
                        </div>
        </form>
</div>

<?PHP include('vistas/layouts/jsstartRegistro.php');  ?>