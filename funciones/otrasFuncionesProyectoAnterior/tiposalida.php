
<?php

$conexion=dbcon();

if ($bandera==1){

    // ROL   ///////////////////

    $rol = array();
    $sql = "select * from tbl_rol order by id_rol asc";

    $usuario_query =mysqli_query($conexion,$sql);
    $cantrol= mysqli_num_rows($usuario_query);
    $i=1;
    while($row_u = mysqli_fetch_array($usuario_query)){
        $rol[$i]= $row_u['des_rol'];
        $i++;

    }

    // COMPLEJO   ///////////////////

    $complejo = array();
    $sql = "select * from tbl_complejo_otros where id_complejo<>12 order by id_complejo asc";

    $usuario_query =mysqli_query($conexion,$sql);
    $cantcomdef = mysqli_num_rows( $usuario_query );

    $i=1;
    while($row_u = mysqli_fetch_array($usuario_query)){
        $complejo[$i]= $row_u['siglas_complejo'];
        $complejo[$i]= $row_u['nombre_complejo'];

        $i++;

    }

    // GERENCIA   ///////////////////

    $gerencia = array();
    $sqlger = "select * from tbl_gerencia order by des_gerencia asc";

    $usuario_queryger =mysqli_query($conexion,$sqlger);
    $i=1;
    while($row_uger = mysqli_fetch_array($usuario_queryger)){
        $gerencia[$i]= $row_uger['des_gerencia'];
        $i++;

    }


}



?>