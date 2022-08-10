
<?php

$conexion=dbcon();

//if ($mod==0){

     // GERENCIA   
     // CUANDO ES UN NUEVO INGRESO   ///////////////////

    $gerencia = array();
    $sqlger = "select * from tbl_gerencia order by des_gerencia asc";

    $usuario_queryger =mysqli_query($conexion,$sqlger);
    $i=1;
    while($row_uger = mysqli_fetch_array($usuario_queryger)){
        $gerencia[$i]['des_gerencia']= $row_uger['des_gerencia'];
        $gerencia[$i]['id_gerencia']= $row_uger['id_gerencia'];

        $i++;

    }
    // AREA   ///////////////////

    $area = array();
    $sqlare = "select * from view_gerenciaxarea order by id_area asc";
    $usuario_queryare =mysqli_query($conexion,$sqlare);
    $cantaredef = mysqli_num_rows( $usuario_queryare );

    $i=1;
    while($row_uare = mysqli_fetch_array($usuario_queryare)){
        $area[$i]= $row_uare['des_area'];
        $i++;
    }

//}




?>