
<?php


if ( isset( $_GET[ 'mod' ] ) ) {
    $mod = $_GET[ 'mod' ];
} else {
    $mod = 0;
}

$conexion=dbcon();
if (isset($_GET['flujoaprob'])){
    $id_usu=$_GET['flujoaprob'];			
} else {
    $flujoaprob='';			
} 

if ($mod==1)   {
    $sql = "select * from view_usuarios where ced_usu='$ced_usu' order by nom_usu asc";

    $usuario_query =mysqli_query($conexion,$sql) or die(mysqli_error($conexion));

    while($row_u = mysqli_fetch_array($usuario_query)){
        $id_usu = $row_u['id_usu'];
        $npe_usu = $row_u['npe_usu'];
        $ced_usu=$_REQUEST['ced_usu'];
        $nom_usu = $row_u['nom_usu'];
        $ape_usu = $row_u['ape_usu'];
        $car_usu = $row_u['car_usu'];
        $tel_usu = $row_u['tel_usu'];
        $cor_usu= $row_u['cor_usu'];
        $log_usu= $row_u['log_usu'];
        $act_usu2= $row_u['act_usu'];
        $sal_usu2= $row_u['sal_usu'];
        $rol_usu2= $row_u['rol_usu'];
        $com_usu2= $row_u['com_usu'];
        $ger_usu2= $row_u['ger_usu'];
        $are_usu2= $row_u['are_usu'];
        //$Anom_usu = $row_u['Anom_usu'];
        if  ($flujoaprob=='S') { $Aususelec = $row_u['Aususelec']; }

        if($act_usu2=="D") {
            $op1="D";	
            $des1="Desactivado";
            $op2="A";	
            $des2="Activado";
        }
        elseif ($act_usu2=="A") {
            $op1="A";	
            $des1="Activado";
            $op2="D";	
            $des2="Desactivado";
        }      
    }
    
    /////  TIPO DE ROL    ****************************

    $arreglo2 = array();

    $sql12 = "select * from tbl_rol where id_rol=$rol_usu2 order by id_rol asc";

    $usuario_query12 =mysqli_query($conexion,$sql12) or die(mysqli_error($conexion));
    $h=0;
    $cantr=mysqli_num_rows($usuario_query12);
    while($row_u4 = mysqli_fetch_array($usuario_query12)){
        $h++;
        $arreglo2[$h]['des_rol'] = $row_u4['des_rol'];   
        $arreglo2[$h]['id_rol'] = $row_u4['id_rol'];
    }
        
    $sql13 = "select * from tbl_rol where id_rol<>$rol_usu2 order by id_rol asc";    
    $usuario_query13 =mysqli_query($conexion,$sql13) or die(mysqli_error($conexion));
    $h=1;
    $cantr13=mysqli_num_rows($usuario_query13);

    while($row_u5 = mysqli_fetch_array($usuario_query13)){
        $h++;
        $arreglo2[$h]['des_rol'] = $row_u5['des_rol'];   
        $arreglo2[$h]['id_rol'] = $row_u5['id_rol'];  
    }    

    /////  COMPLEJO    ****************************

    $Acomp = array(); $h=0;

    $sqlcom1 = "select * from tbl_complejo_otros where id_complejo=$com_usu2 and id_complejo<>12 order by id_complejo asc";    
    $usuario_querycom1 =mysqli_query($conexion,$sqlcom1) or die(mysqli_error($conexion));
    
    $cantcomp1=mysqli_num_rows($usuario_querycom1);
    while($row_ucom1 = mysqli_fetch_array($usuario_querycom1)){
        $h++;
        $Acomp[$h]['id_complejo'] = $row_ucom1['id_complejo'];   
        $Acomp[$h]['siglas_complejo'] = $row_ucom1['siglas_complejo'];
        $Acomp[$h]['nombre_complejo'] = $row_ucom1['nombre_complejo'];

    }

    $h=1;
    $sqlcom2 = "select * from tbl_complejo_otros where id_complejo<>$com_usu2 and id_complejo<>12 order by id_complejo asc";   
    $usuario_query13 =mysqli_query($conexion,$sqlcom2) or die(mysqli_error($conexion));
    
    $cantr13=mysqli_num_rows($usuario_query13);

    while($row_u5 = mysqli_fetch_array($usuario_query13)){
        $h++;
        $Acomp[$h]['id_complejo'] = $row_u5['id_complejo'];   
        $Acomp[$h]['siglas_complejo'] = $row_u5['siglas_complejo'];
        $Acomp[$h]['nombre_complejo'] = $row_u5['nombre_complejo'];
    }
    
    /////  GERENCIA    ****************************

    $Agerencia = array(); $h=0;

    $sqlg1 = "select * from tbl_gerencia where id_gerencia=$ger_usu2 order by id_gerencia asc";    
    $usuario_queryg1 =mysqli_query($conexion,$sqlg1) or die(mysqli_error($conexion));
    
    $cantcomp1=mysqli_num_rows($usuario_queryg1);
    while($row_ug1 = mysqli_fetch_array($usuario_queryg1)){
        $h++;
        $Agerencia[$h]['id_gerencia'] = $row_ug1['id_gerencia'];   
        $Agerencia[$h]['des_gerencia'] = $row_ug1['des_gerencia'];
    }

    $h=1;
    $sqlg2 = "select * from tbl_gerencia where id_gerencia<>$ger_usu2 order by id_gerencia asc";    
    $usuario_queryg2 =mysqli_query($conexion,$sqlg2) or die(mysqli_error($conexion));
    
    $cantr13=mysqli_num_rows($usuario_queryg2);

    while($row_ug2 = mysqli_fetch_array($usuario_queryg2)){
        $h++;
        $Agerencia[$h]['id_gerencia'] = $row_ug2['id_gerencia'];   
        $Agerencia[$h]['des_gerencia'] = $row_ug2['des_gerencia'];
    }

    /////  AREA    ****************************

    $Aarea = array(); $h=0;

    $sqla1 = "select * from view_gerenciaxarea where id_area=$are_usu2 order by des_area asc";    
    $usuario_querya1 =mysqli_query($conexion,$sqla1) or die(mysqli_error($conexion));
    
    while($row_ua1 = mysqli_fetch_array($usuario_querya1)){
        $h++;
        $Aarea[$h]['id_area'] = $row_ua1['id_area'];   
        $Aarea[$h]['des_area'] = $row_ua1['des_area'];
    }

    $h=1;
    $sqla2 ="select * from view_gerenciaxarea where id_area<>$are_usu2 order by des_area asc";  
    $usuario_querya2 =mysqli_query($conexion,$sqla2) or die(mysqli_error($conexion));       

    while($row_ua2 = mysqli_fetch_array($usuario_querya2)){
        $h++;
        $Aarea[$h]['id_area'] = $row_ua2['id_area'];   
        $Aarea[$h]['des_area'] = $row_ua2['des_area'];
    }    
}
if ( isset( $_REQUEST[ 'v1' ] ) ) {
    $id_usu=$_REQUEST[ 'v1' ];
    if ($id_usu==''){$id_usu=0;}
    $sqla2 ="select * from view_usuarios where id_usu=$id_usu ";  
    $usuario_querya2 =mysqli_query($conexion,$sqla2) or die(mysqli_error($conexion));  
    $row =mysqli_fetch_array($usuario_querya2);
    $are_usu=$row['are_usu'];
    $ger_usu=$row['ger_usu'];
}

?>