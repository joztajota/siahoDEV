
<?php

$conexion=dbcon();

    // COMPLEJO   ///////////////////

    $Aprobadores = array();
    $sql = "select * from view_usuarios where rol_usu=3 and act_usu='A' order by nom_usu asc";

    $usuario_query =mysqli_query($conexion,$sql);
    $cants= mysqli_num_rows($usuario_query);
    $i=1;
    while($row_u = mysqli_fetch_array($usuario_query)){
        $Aprobadores[$i]['id_usu']= $row_u['id_usu'];
        $Aprobadores[$i]['nom_usu']= $row_u['nom_usu']." ". $row_u['ape_usu']." | ". $row_u['des_gerencia'];
        //$Aprobadores[$i]['des_tipsal']= $row_u['des_tipsal'];


        $Aidselec= $Aprobadores[$i]['id_usu'];
      //  $Atiposal= $Aprobadores[$i]['des_tipsal'];
        $i++;

    }

    $Solicitantes = array();
    $sqls = "select * from view_usuarios where rol_usu=2 and act_usu='A' order by nom_usu asc";

    $usuario_querys =mysqli_query($conexion,$sqls);
    $cants= mysqli_num_rows($usuario_querys);
    $i=1;
    while($row_us = mysqli_fetch_array($usuario_querys)){
        $Solicitantes[$i]['id_usu']= $row_us['id_usu'];
        $Solicitantes[$i]['nom_usu']= $row_us['nom_usu']." ". $row_us['ape_usu'];
       // $Solicitantes[$i]['des_tipsal']= $row_us['des_tipsal'];
        $Solicitantes[$i]['des_gerencia']= $row_us['des_gerencia'];


        $Aidselec= $Solicitantes[$i]['id_usu'];
       // $Atiposal= $Solicitantes[$i]['des_tipsal'];
        $i++;

    }







?>