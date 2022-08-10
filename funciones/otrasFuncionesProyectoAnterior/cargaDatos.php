<?php
$conexion = dbcon();



$aspirante_ced = $_REQUEST[ 'aspirante_ced' ];
$aspirante_nombre = $_REQUEST[ 'aspirante_nombre' ];
$aspirante_fechNac = $_REQUEST[ 'aspirante_fechNac' ];
$aspirante_edad = $_REQUEST[ 'aspirante_edad' ];
$aspirante_sexo = $_REQUEST[ 'aspirante_sexo' ];

$aspirante_telcelular = $_REQUEST[ 'aspirante_telcelular' ];
$aspirante_telcantv = $_REQUEST[ 'aspirante_telcantv' ];
$aspirante_correo = $_REQUEST[ 'aspirante_correo' ];

$id_estado = $_REQUEST[ 'id_estado' ];
$id_municipio = $_REQUEST[ 'id_municipio' ];
$id_parroquia = $_REQUEST[ 'id_parroquia' ];

$id_nivelAcademico = $_REQUEST[ 'id_nivelAcademico' ];

$id_clasificacion = $_REQUEST[ 'id_clasificacion' ];

$aspirante_status = "REGISTRADO";

$aspirante_fechReg = $_REQUEST[ 'aspirante_fechReg' ];


?>