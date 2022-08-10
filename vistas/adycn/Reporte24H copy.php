<?php
if (!isset($_SESSION)) {
        session_start();
}

$enlaceR = "dashboard.php?activo=inicio";
include('funciones/funcionesgenerales/conecciones/MariaDB/connsisgm.php');
include('vistas/layouts/stylesstartRegistro.php');
//include( 'funciones/otrasFuncionesProyectoAnteriores/cargaFormulario.php' );

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

                                <?php if ($bandera == 1) {        ?>

                                        <div class="card mb-12 mt-4">
                                                <!--  titulo del body -->
                                                <div class="card-header text-danger"> <i class="fas fa-check-square"></i> &nbsp;<b>NOVEDADES DIARIAS
                                                                ADyCN</b> </div>

                                                        <!--Lista de tab -->
                                                        <div class="row p-2 pt-0 m-0 small">
                                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                                        <li class="nav-item" role="presentation">
                                                                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><b>Revisión de Unidades de Emergencias</b></button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><b>Revisión de Sala de Bombas de Red Contra Incendios # 01</b></button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="pills-profile2-tab" data-bs-toggle="pill" data-bs-target="#pills-profile2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><b>Revisión de Sala de Bombas de Red Contra Incendios # 02</b></button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>Revisión de Sistema de Cebado</b></button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="pills-contact1-tab" data-bs-toggle="pill" data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>Disponibilidad de Espuméenos</b></button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="pills-contact2-tab" data-bs-toggle="pill" data-bs-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>Brigadistas de Emergencia por Planta</b></button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">

                                                                        <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="pills-contact3-tab" data-bs-toggle="pill" data-bs-target="#pills-contact3" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>Reporte de Comité Ayuda Mutua</b></button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="pills-contact4-tab" data-bs-toggle="pill" data-bs-target="#pills-contact4" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>Recorrido del Área Industrial</b></button>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                                <button class="nav-link" id="pills-contact4-tab" data-bs-toggle="pill" data-bs-target="#pills-contact5" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>Reporte de Atención Según Evento</b></button>
                                                                        </li>
                                                                </ul>
                                                                <!--Contenido de Tab Unidades de emergencia -->
                                                                <div class="tab-content" id="pills-tabContent">
                                                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                                                <div class="container-fluid mt-3">

                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                                <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                                <div class="col-sm-4 p-3 bg-primary text-white text-center"><b>Observaciones</b></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-black">Camión de Supresión CB-01</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-black">Camión de Supresión CB-02</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-black">Camión de Supresión CB-04</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Camión de Supresión CB-06</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Carro Químico CQ-01</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Carro de Rescate VCR-01</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Carro de Rescate VCR-02</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Ambulancia Tipo II AMB-01</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Otros Especifique:</div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <!--Contenido de Sala de Bombas 1 -->
                                                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                                <div class="container-fluid mt-3">

                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-black"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-2 p-3 border border-primary text-black text-center"><b>OPERATIVA</b>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                                <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                                <div class="col-sm-4 p-3 bg-primary text-white text-center"><b>Observaciones</b></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-black">Jockey Nº 1</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Jockey Nº 2</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Bomba Eléctrica Nº 1</div>
                                                                                                <div class="col-sm-1 p-3 bg text- text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Bomba Eléctrica Nº 2</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Bomba Diésel N° 1</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Bomba Diésel N° 2</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Otros Especifique:</div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <!--Contenido de Tab Sala de Bombas II -->
                                                                        <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile2-tab">
                                                                                <div class="container-fluid mt-3">

                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-black"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-2 p-3 border border-primary text-black text-center"><b>OPERATIVA</b>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                                <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                                <div class="col-sm-4 p-3 bg-primary text-white text-center"><b>Observaciones</b></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-black">CGA-1019A</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">CGA-1019B</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Bomba Eléctrica CGA-1018A</div>
                                                                                                <div class="col-sm-1 p-3 bg text- text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Bomba Diesel CGA-1018B</div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Otros Especifique:</div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <!--Revisión de Sistema de Cebado-->
                                                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                                                <div class="container-fluid mt-3">

                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-black"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-2 p-3 border border-primary text-black text-center"><b>OPERATIVA</b>
                                                                                                </div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                                <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                                <div class="col-sm-4 p-3 bg-primary text-white text-center"><b>Observaciones</b></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-black">Diesel</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Eléctrico</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Vapor</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Otros Especifique:</div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>


                                                                                </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact1-tab">
                                                                                <div class="container-fluid mt-3">

                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-black"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-2 p-3  border border-primary text-black text-center"><b>OPERATIVA</b>
                                                                                                </div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                                <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                                <div class="col-sm-4 p-3 bg-primary text-white text-center"><b>Observaciones</b></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-black">U/E-ONE I CONCENTRADO AFFF</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">U/E-ONE II CONCENTRADO AFFF</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">U/ PIERCE CHEMGUARD</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">SALA DE MAQUINA / MUELLE PETROQ</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text- text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact2-tab">
                                                                                <div class="container-fluid mt-3">

                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-black"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-2 p-3  text-black"></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-black "></div>
                                                                                                <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>Nro.</b></div>
                                                                                                <div class="col-sm-4 p-3 bg-primary text-white text-center"><b>Observaciones</b></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3  text-black">Amoniaco</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black">Almacen Central</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black">Almacen de Quimicos</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Almacen de Urea</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Comedor Industrial</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">DAP</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Edificio Mantenimiento Nitrogenado
                                                                                                </div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Edificio Producción Nitrogenado
                                                                                                </div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Ensacado de Urea</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Fosfórico</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">NKP</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Oficinas y Edificios</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Planta de Amoniaco</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Planta de Urea</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Planta Servicios Industriales I
                                                                                                </div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Planta Servicios Industriales II
                                                                                                </div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Sala de Control Nitrogenados</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Sulfato de Amonio</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Sulfurico 215</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Sulfurico 218</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-Black text text-xl">Talleres</div>


                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>


                                                                                        <div class="row">
                                                                                                <div class="col-sm-3 p-3 bg text-black">Otros Especifique:</div>


                                                                                                <div class="col-sm-1 p-3 bg text-white"><input type="text" id="input_9_2_1" class="form-textbox validate[required, requireEveryRow]" size="10" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="pills-contact3" role="tabpanel" aria-labelledby="pills-contact3-tab">
                                                                                <div class="container-fluid mt-3">

                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-black"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-2 p-3  border border-primary text-black text-center"><b>REALIZADO</b>
                                                                                                </div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                                <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                                <div class="col-sm-4 p-3 bg-primary text-white text-center"><b>Observaciones</b></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3  text-black">Descripción de Atención a Evento en apoyo al CAM
                                                                                                </div>

                                                                                                <div class="col-sm-1 p-3  text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3  text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3  text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Descripción de Atención a Evento en apoyo al CAM
                                                                                                </div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Materiales utilizados en la atención Evento
                                                                                                        Reportado por el CAM</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Cantidad de Respondedores de ADyCN que salieron
                                                                                                        a la Atención Evento reportado por el CAM</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Otros Especifique:</div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                </div>

                                                                        </div>
                                                                        <div class="tab-pane fade" id="pills-contact4" role="tabpanel" aria-labelledby="pills-contact4-tab">
                                                                                <div class="container-fluid mt-3">

                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-black"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-2 p-3  border border-primary text-black text-center"><b>REALIZADO</b>
                                                                                                </div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                                <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                                <div class="col-sm-6 p-3 bg-primary text-white text-center"><b>REPORTE DE ACTIVIDADES
                                                                                                                REALIZADAS DURANTE EL RECORRIDO EN LAS AREAS:</b></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3  text-black">Amoniaco</div>

                                                                                                <div class="col-sm-1 p-3  text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3  text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3  text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Almacen Central</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Almacen de Quimicos</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Almacen de Urea</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Comedor Industrial</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">DAP</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Edificio Mantenimiento Nitrogenado
                                                                                                </div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Edificio Producción Nitrogenado</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Ensacado de Urea</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Fosfórico</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">NKP</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="100" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Oficinas y Edificios</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Planta de Amoniaco</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Planta de Urea</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Planta Servicios Industriales I</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Planta Servicios Industriales II</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Sala de Control Nitrogenados</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Sulfato de Amonio</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Sulfurico 215</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Sulfurico 218</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Talleres</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Otros Especifique:</div>
                                                                                                <div class="col-sm-8 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="pills-contact5" role="tabpanel" aria-labelledby="pills-contact4-tab">
                                                                                <div class="container-fluid mt-3">

                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-black"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-2 p-3  border border-primary text-black text-center"><b>REALIZADO</b>
                                                                                                </div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3  text-white"></div>
                                                                                                <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                                <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                                <div class="col-sm-4 p-3 bg-primary text-white text-center"><b>Observaciones:</b></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3  text-black">Reporte de Atención Prehospitalaria (API)</div>

                                                                                                <div class="col-sm-1 p-3  text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3  text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3  text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Control de ofidios y/o insectos</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Control de Evento Tipo Explosiones</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Control de Evento Tipo Incendios</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Control de Evento de Materiales
                                                                                                        Peligrosos</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black text text-xl">Control de Evento de Rescate</div>

                                                                                                <div class="col-sm-1 p-3 bg text-white  text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                                <div class="col-sm-4 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>

                                                                                        <div class="row">
                                                                                                <div class="col-sm-2 p-3 bg text-Black">Otros Especifique: Guardia de Protección,
                                                                                                        Desinfección</div>
                                                                                                <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>

                                                                                        </div>
                                                                                </div>

                                                                                <div class="container mt-3">
                                                                                        <p class="text-danger text-md-right text-lg-right"><b>Actividades Realizadas por Personal de
                                                                                                        ADyCN Durante la Jornada Laboral</b></p>
                                                                                        <form action="/action_page.php">
                                                                                                <div class="mb-3 mt-3">
                                                                                                        <label for="comment"></label>
                                                                                                        <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                                                                                                </div>

                                                                                        </form>
                                                                                </div>

                                                                                <div class="container mt-3">
                                                                                        <p class="text-danger text-md-right text-lg-right"><b>Observaciones</b></p>
                                                                                        <form action="/action_page.php">
                                                                                                <div class="mb-3 mt-3">
                                                                                                        <label for="comment"></label>
                                                                                                        <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                                                                                                </div>

                                                                                </div>
                                                                        </div>
                                                                </div>
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