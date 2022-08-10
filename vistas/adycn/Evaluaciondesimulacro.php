<?php
if (!isset($_SESSION)) {
        session_start();
}
$enlaceR = "dashboard.php?activo=inicio";
include('funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php');

$fecha_actual = date('d/m/Y');
$hereg = date("h:i:A");

$color = "";
if (isset($_REQUEST["bandera"])) {
        $bandera = $_REQUEST["bandera"];  //Ver Registro
} else {
        $bandera = 1;  //Crear Registro
}

if (isset($_REQUEST["pagina_usu"])) {
        $pagina_usu = $_REQUEST["pagina_usu"];  //Ver 
} else {
        $pagina_usu = "inicio";  //Crear Registro
}

if (isset($_REQUEST["labor_codigo"])) {
        $labor_codigo_m = $_REQUEST["labor_codigo"];  //Ver Registro
} else {
        $labor_codigo_m = "";  //Crear Registro
}
if (isset($_REQUEST["labor"])) {
        $labor = $_REQUEST["labor"];  //Ver Registro
} else {
        $labor = 0;  //Crear Registro
}

if (isset($_REQUEST["aspirante_cedula"])) {
        $aspirante_cedula_m = $_REQUEST["aspirante_cedula"];
} else {
        $aspirante_cedula_m = "";
}

if (isset($_REQUEST["registro_codigo"])) {
        $registro_codigo_m = $_REQUEST["registro_codigo"];
} else {
        $registro_codigo_m = "";
}

$image = "public/img/sistema/ADyCN.jpg";
include('funciones/funcionesGenerales/enlaces.php');

include('vistas/layouts/stylesstartRegistro.php');
?>

<div class="container-fluid p-4 pt-0" onLoad="limpiarespacios()">
        <div class="mb-2">
                <div class="mt-4" style="font-size: 1.75rem; color: #3e3e8c; font-weight: bold; <?php echo $color; ?>">
                        <?php
                        if ($bandera == 1) { ?>
                                <img style="position: relative; center: 0px; top: 0px; width: 5%;" src="public/img/sistema/icon/r24h.png" />
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
        <ol class="breadcrumb mb-12 ms-12">
                <?php echo $enlace2; ?>
        </ol>
        <!--<form action="" method="post" name="solicitud" id="form2">  -->
        <form action="" method="post" name="solicitud" id="form2">
                <div class="row">
                        <div class="col-xl-12 mt-2">
                                <?php if ($bandera != 1) {     ?>
                                        <!-- SI ES ANALISTA   ------>
                                        <div class="card-header text-danger" style="border: 1px solid #d4d3df;">
                                                <div class="row p-2 pb-0 pt-0">
                                                        <div class="col-xl-9 p-0 mb-2">
                                                                <b>DATOS DEL REGISTRO</b>
                                                        </div>
                                                        <div class="col-xl-3" style="text-align: end;">
                                                                <?php
                                                                if ($bandera == 1) { ?>
                                                                        <label type="date" class="form-control" aria-describedby="passwordHelpBlock" disabled style="background-color: #fff0; border:0; text-align: end; font-weight: bold;">
                                                                                <?php echo $fecha_actual;  ?>
                                                                        </label>
                                                                <?php }  ?>

                                                                <?php
                                                                if ($bandera == 2) { ?>
                                                                        <a href="dashboard.php?activo=detalleaspirante&bandera=9&registro_codigo=<?php echo trim($registro_codigo_m) ?>" style="color: #b9935a">
                                                                                <img style="position: relative; center: 0px; top: 0px; width: 20%;" src="public/img/sistema/verdetalleRojo.png" />
                                                                        </a>
                                                                <?php }  ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="card mb-2 mt-2">
                                                <div class="row p-3 pt-0" style="color:black">
                                                        <div class="col-xl-2">
                                                                <label class="form-label m-0 p-0 mt-2 pt-1">Código </label>
                                                                <input type="text" id="registro_codigo_vista" name="registro_codigo_vista" class="form-control" aria-describedby="passwordHelpBlock" value="<?php echo $registro_codigo_m;  ?>" disabled>
                                                        </div>
                                                        <div class="col-xl-2">
                                                                <label class="form-label mt-2">Creado</label>
                                                                <input type="text" id="registro_fechacrea_vista" name="registro_fechacrea_vista" class="form-control" aria-describedby="passwordHelpBlock" value="<?php
                                                                                                                                                                                                                        $registro_fechacrea_m = date_create($registro_fechacrea_m);
                                                                                                                                                                                                                        $registro_fechacrea_m = date_format($registro_fechacrea_m, "d/m/Y");
                                                                                                                                                                                                                        echo $registro_fechacrea_m;
                                                                                                                                                                                                                        ?>" disabled>
                                                        </div>
                                                        <div class="col-xl-3">
                                                                <label for="" class="form-label mt-2">Estatus</label>
                                                                <input type="text" id="registro_status_vista" name="registro_status_vista" class="form-control" aria-describedby="passwordHelpBlock" value="<?php echo $registro_status_m; ?>" disabled>
                                                        </div>
                                                        <div class="col-xl-3">
                                                                <label class="form-label mt-2">PCP </label>
                                                                <input type="text" id="registro_validaPCP_vista" name="registro_validaPCP_vista" class="form-control" aria-describedby="passwordHelpBlock" value="<?php echo $registro_validaPCP_m; ?>" disabled>
                                                        </div>
                                                        <div class="col-xl-2">
                                                                <label class="form-label mt-2">SALUD </label>
                                                                <input type="text" id="registro_validaSalud_vista" name="registro_validaSalud_vista" class="form-control" aria-describedby="passwordHelpBlock" value="<?php echo $registro_validaSalud_m; ?>" disabled>
                                                        </div>
                                                </div>
                                        </div>
                                <?php }  ?>
                                <!-- FIN DE SI ES ANALISTA   ------>

                                <div class="card mb-0 mt-2" style="color:black">
                                        <div class="card-header text-danger"> &nbsp;&nbsp;<b> Evaluación de Simulacro</b>
                                                <?php if ($bandera == 1) {  ?>
                                                        <input type="text" name="clasificacionSeleccionada" id="clasificacionSeleccionada" style="width: 50%;;font-weight: bolder; border:0; color: #dc3545; background: transparent;" disabled />
                                                <?php }  ?>
                                                <?php if ($bandera == 2) {  ?>
                                                        <input type="text" name="clasificacionSeleccionada" id="clasificacionSeleccionada" style="width: 50%;;font-weight: bolder; border:0; color: #dc3545; background: transparent;" value="<?php echo $aspirante_Clasificacion_m; ?>" disabled />
                                                <?php }  ?>
                                                </b>
                                        </div>
                                        <div class="row mb-0 p-2 m-3">
                                                <div class="col-x2-12 mt-2">
                                                        <?php if ($bandera == 1) {  // Creando Registro      
                                                        ?>
                                                                <article style="margin-bottom: 1.8%">
                                                                        <table class="inventory" style="border-collapse: inherit;" id='tabla_detalle'>
                                                                                <div class="row p-2 pt-0 m-0 small">

                                                                                        <div class="container-fluid mt-3">
                                                                                                <div class="row">

                                                                                                        <div class="col-sm-3 p-1 text-Black text-center"><b>Instalación</b>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3 p-1 text-black text-center"><b>Fecha de
                                                                                                                        Ejecucion</b></div>
                                                                                                        <div class="col-sm-3 p-1 bg text-black text-center"><b>Hora de
                                                                                                                        Inicio</b></div>
                                                                                                        <div class="col-sm-3 p-1 text-black text-center"><b>Hora de
                                                                                                                        Finalizacion</b></div>


                                                                                                </div>

                                                                                                <div class="row">
                                                                                                        <div class="col-sm-3  bg- text-white text text-center">
                                                                                                                <select id="ger_usu" name="ger_usu" class="chosen-select" onchange="llena_area()">
                                                                                                                </select>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3  text-white text-center"><input type="date" name="experiencia_fecha_desde[]" id="experiencia_fecha_desde" />
                                                                                                        </div>
                                                                                                        <div class="col-sm-3 p-3 bg text-white"><input type="time" name="inicio"></div>
                                                                                                        <div class="col-sm-3 p-3 bg text- text-center"><input type="time" name="fin"></div>


                                                                                                </div>
                                                                                                <div class="row">
                                                                                                        <div class="col-sm-3 p-1  text-Black text-center"><b>Producto
                                                                                                                        Involucrado</b></div>
                                                                                                        <div class="col-sm-3 p-1 text-Black text-center"><b>Equipo</b></div>
                                                                                                        <div class="col-sm-3 p-1 text-black text-center"><b>Simulacion</b></div>
                                                                                                        <div class="col-sm-3 p-1 bg text-black text-center"><b>Tipo de
                                                                                                                        Emergencia</b></div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                        <div class="col-sm-3  bg- text-white text text-center">
                                                                                                                <select id="ger_usu" name="ger_usu" class="chosen-select" onchange="llena_area()">
                                                                                                                </select>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3  bg- text-white text text-center">
                                                                                                                <select id="ger_usu" name="ger_usu" class="chosen-select" onchange="llena_area()">
                                                                                                                </select>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3  bg- text-white text text-center">
                                                                                                                <select id="ger_usu" name="ger_usu" class="chosen-select" onchange="llena_area()">
                                                                                                                </select>
                                                                                                        </div>
                                                                                                        <div class="col-sm-3  bg- text-white text text-center">
                                                                                                                <select id="ger_usu" name="ger_usu" class="chosen-select" onchange="llena_area()">
                                                                                                                </select>
                                                                                                        </div>

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
                                                <div class="card-header text-danger"> </div>
                                                <div class="row p-2 pt-0 m-0 small">
                                                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                                <li class="nav-tabs" role="presentation">
                                                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><b>ESCENARIO DEL EVENTO</b></button>
                                                                </li>
                                                                <li class="nav-tabs" role="presentation">
                                                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><b>BRIGADA DE EMERGENCIA</b></button>
                                                                </li>
                                                                <li class="nav-tabs" role="presentation">
                                                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>SUPERVISOR DE TURNO/ INSTALACIÓN AFECTADA CONTROL OPERACIONAL DE LA
                                                                                        EMERGENCIA</b></button>
                                                                </li>
                                                                <li class="nav-tabs" role="presentation">
                                                                        <button class="nav-link" id="pills-contact1-tab" data-bs-toggle="pill" data-bs-target="#pills-contact1" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>GERENCIA DE SALUD</b></button>
                                                                </li>
                                                                <li class="nav-tabs" role="presentation">
                                                                        <button class="nav-link" id="pills-contact2-tab" data-bs-toggle="pill" data-bs-target="#pills-contact2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>SUPERVISOR GENERAL DE PRODUCCIÓN Y SUPERINTENDENCIA DE ADyCN</b></button>
                                                                </li>
                                                                <li class="nav-tabs" role="presentation">

                                                                <li class="nav-tabs" role="presentation">
                                                                        <button class="nav-link" id="pills-contact3-tab" data-bs-toggle="pill" data-bs-target="#pills-contact3" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>OBSERVACIONES DEL
                                                                                        SIMULACRO</b></button>
                                                                </li>
                                                                <li class="nav-tabs" role="presentation">
                                                                        <button class="nav-link" id="pills-contact4-tab" data-bs-toggle="pill" data-bs-target="#pills-contact4" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><b>FICHA DE EVALUACIÓN
                                                                                        SIMULACRO</b></button>
                                                                </li>
                                                        </ul>
                                                        <div class="tab-content" id="pills-tabContent">
                                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                                        <div class="container-fluid mt-3">

                                                                                <div class="row">
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-2 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                        <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                        <div class="col-sm-6 p-3 bg-primary text-white text-center"><b>Observaciones</b>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-black">¿El personal de operaciones (supervisor
                                                                                                de Turno) fue informado del evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="100" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El personal de Planta, contratistas y
                                                                                                terceros fueron informados del evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿La Superintendencia de Administración
                                                                                                de Desastre y Continuidad del Negocio (ADyCN) fue informado del evento?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Los Brigadistas de Emergencia asignados
                                                                                                a la planta respondieron ante el evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El personal que no estaba involucrado
                                                                                                con el evento fue desalojado?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se activó algún sistema de protección contra incendios?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El Plan de acción operacional fue activado de forma
                                                                                                efectiva para dar respuesta ante el evento?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Al llegar el personal de Administración de Desastre y
                                                                                                Continuidad del Negocio (ADyCN) al sitio del evento, se activó el Comando de Incidente (CI)?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se solicitó al personal de Prevención y Control de
                                                                                                Pérdidas, el cierres de las vías adyacentes al sitio del evento?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se solicitaron los recursos necesarios para el traslado y
                                                                                                Desalojo del Personal?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se solicitaron los recursos necesarios para el traslado y
                                                                                                Desalojo del Personal?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El evento afecto otras áreas cercanas?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                        <div class="container-fluid mt-3">

                                                                                <div class="row">
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-2 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                        <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                        <div class="col-sm-6 p-3 bg-primary text-white text-center"><b>Observaciones</b>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-black">¿Los Brigadistas estaban identificados al momento de
                                                                                                iniciar el Desalojo?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿La activación del procedimiento de Desalojo se realizo
                                                                                                de manera efectiva?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se realizó un recorrido por la diferente área del edificio
                                                                                                para verificar personas rezagadas?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Posterior al evento se realizó una inspección en las
                                                                                                áreas, para detectar condición insegura, antes de ingresar el personal a la instalación?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se llevó al personal desalojado al punto de reunión
                                                                                                establecido en la planta?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se realizó conteo del personal al llegar al punto de
                                                                                                reunión?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se realizó conteo del personal al llegar al punto de
                                                                                                reunión?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se realizó el conteo del personal al ingresar al bus?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El personal de contratista fue Desalojado del área y
                                                                                                retirado del sitio en vehículos propios de la empresa?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                                        <div class="container-fluid mt-3">

                                                                                <div class="row">
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-2 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                        <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                        <div class="col-sm-6 p-3 bg-primary text-white text-center"><b>Observaciones</b>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-black">¿El Supervisor de Turno de Administración
                                                                                                de Desastre y Continuidad del Negocio (ADyCN conformo el Comando de Incidente (CI)
                                                                                                en el sitio cercano al evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El Supervisor de Turno Informo del evento
                                                                                                al Supervisor General de Producción?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El Supervisor De Turno Operacional
                                                                                                coordino a los Brigadistas de emergencia de la planta para mitigar el evento?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El supervisor de Turno activo el protocolo
                                                                                                control operacional para mitigar el evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿En conjunto con el supervisor de Turno de
                                                                                                Administración de Desastre y Continuidad del Negocio (ADyCN) se trazaron
                                                                                                las estrategias de control del evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿ Se establecieron los puntos estratégicos
                                                                                                para el desalojo del personal?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Informo al Supervisor General de
                                                                                                operaciones sobre el control de la emergencia?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>

                                                                        </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact1-tab">
                                                                        <div class="container-fluid mt-3">

                                                                                <div class="row">
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-2 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                        <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                        <div class="col-sm-6 p-3 bg-primary text-white text-center"><b>Observaciones</b>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-black">¿El paciente fue entregado a la enfermera
                                                                                                de guardia?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El Técnico respondedor de Administración
                                                                                                de Desastre y Continuidad del (ADyCN) o el personal paramédicos entrego
                                                                                                de forma apropiada y técnica al personal de enfermera de guardia al lesionado?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El lesionado fue revisada por un médico?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El lesionado fue referido a otro centro asistencial?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El trasbordo del lesionado fue realizado de forma segura
                                                                                                y adecuado a la condición del diagnóstico del lesionado?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>

                                                                        </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact2-tab">
                                                                        <div class="container-fluid mt-3">

                                                                                <div class="row">
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-2 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                        <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                        <div class="col-sm-6 p-3 bg-primary text-white text-center"><b>Observaciones</b>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-black">¿Se recibió información detallada del evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El personal de Administración de Desastre y
                                                                                                Continuidad del Negocio informo al Supervisor General de Producción del evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El Supervisor General de Producción solicito el
                                                                                                apoyo de unidades de transporte de personal para desalojar la planta afectada?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El supervisor de Producción informo del evento a
                                                                                                las plantas adyacentes al evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Se recibió información el Supervisor General de
                                                                                                Producción por parte del Supervisor de Turno de Planta sobre el evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El supervisor de turno de la planta afectada solicito
                                                                                                apoyo con brigadistas de planta?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El supervisor de turno de la Planta informo al
                                                                                                Supervisor General de Producción sobre el control del evento y la finalización?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-contact3" role="tabpanel" aria-labelledby="pills-contact3-tab">
                                                                        <div class="container-fluid mt-3">

                                                                                <div class="row">
                                                                                        <div class="col-sm-2 p-3  bg-primary text-white text-center"><b>Hora</b></div>
                                                                                        <div class="col-sm-1 p-3  bg-primary text-white"></div>
                                                                                        <div class="col-sm-1 p-3  bg-primary text-white"></div>
                                                                                        <div class="col-sm-6 p-3 bg-primary text-white text-center"><b>Desviacion</b></div>
                                                                                        <div class="col-sm-1 p-3  text-white text-center"><b></b></div>
                                                                                        <div class="col-sm-1 p-3  text-white text-center"><b></b>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row" id="Obsimulacro">
                                                                                        <div class="col-sm-3 p-3 bg text-black">
                                                                                                <div class="col-sm-3 p-3 bg text-white"><input type="time" name="inicio"></div>
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white text-center">
                                                                                                <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white"></div>
                                                                                </div>

                                                                        </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-contact4" role="tabpanel" aria-labelledby="pills-contact4-tab">
                                                                        <div class="container-fluid mt-3">

                                                                                <div class="row">
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3  text-white"></div>
                                                                                        <div class="col-sm-2 p-3  text-white"></div>
                                                                                        <div class="col-sm-1 p-3 bg-primary text-white text-center"><b>Si</b></div>
                                                                                        <div class="col-sm-1 p-3 bg-danger text-white text-center"><b>No</b></div>
                                                                                        <div class="col-sm-6 p-3 bg-primary text-white text-center"><b>Observaciones</b>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-black">¿El personal de operaciones (supervisor
                                                                                                de Turno) fue informado del evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El personal de Planta, contratistas y
                                                                                                terceros fueron informados del evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿La Superintendencia de Administración
                                                                                                de Desastre y Continuidad del Negocio (ADyCN) fue informado del evento?
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿Los Brigadistas de Emergencia asignados
                                                                                                a la planta respondieron ante el evento?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">¿El personal que no estaba involucrado
                                                                                                con el evento fue desalojado?</div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">Camión CISTERNA 750/Bomba ROSENBAUER
                                                                                        </div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-1 p-3 bg text-white text-center"><input type="radio" id="input_9_2_1" class="form-radio validate[required, requireEveryRow]" name="q9_revisionDe[2][1]" value="Si" aria-labelledby="label_9_col_1 label_9_row_2" /></div>
                                                                                        <div class="col-sm-6 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-4 p-3 bg text-Black">Otros Especifique:</div>
                                                                                        <div class="col-sm-8 p-3 bg text-white"><input type="text" id="input_9_2_3" class="form-textbox validate[required, requireEveryRow]" size="80" name="q9_revisionDe[2][3]" style="width:100%;box-sizing:border-box" value="" aria-labelledby="label_9_col_3 label_9_row_2" /></div>
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