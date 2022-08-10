<?php
$conexion = dbcon();

$whereR=""; $whereS=""; $whereC=""; $whereG=""; $whereA="";
$h=0; $i=0; $c=0; $g=0; $a=0;

if ($mod==2)  {  // CREAR REGISTRO NUEVO
  $rol_usuario = array();
  $roles = array();
  $complejo_usuario=array();
  $gerencia_usuario=array();
  $area_usuario=array();

  $sqlusuarios = "select * from view_usuarios where ced_usu LIKE '%$ced_usu%' order by id_usu asc";
  $sql_usuarios = mysqli_query( $conexion, $sqlusuarios )or die( mysqli_error( $conexion ) );

  while ( $row_activo = mysqli_fetch_array( $sql_usuarios ) ) {
    $usuarios_act_usu_m[1]['act_usu'] = $row_activo[ 'act_usu' ];
    $usuarios_act_usu_m[1]['des_status'] = $row_activo[ 'des_status' ];
    $npe_usu = $row_activo['npe_usu'];
    $nom_usu = $row_activo['nom_usu'];
    $ape_usu = $row_activo['ape_usu'];
    $car_usu = $row_activo['car_usu'];
    $tel_usu = $row_activo['tel_usu'];
    $cor_usu= $row_activo['cor_usu'];
    $log_usu= $row_activo['log_usu'];

    $rol_usu= $row_activo['rol_usu'];
    $act_usu= $row_activo['act_usu'];
    $com_usu= $row_activo['com_usu'];
    $ger_usu= $row_activo['ger_usu'];
    $are_usu= $row_activo['are_usu'];

    $whereR="where id_rol<>".$rol_usu;
    $sql12 = "select * from tbl_rol where id_rol=$rol_usu order by id_rol asc";
    $usuario_query12 =mysqli_query($conexion,$sql12) or die(mysqli_error($conexion));    
    while($row_u4 = mysqli_fetch_array($usuario_query12)){
      $rol_usuario[$h]['id_rol'] = $row_u4['id_rol'];
      $rol_usuario[$h]['des_rol'] = $row_u4['des_rol'];
      $h++;
    }      
    
    $whereS="where id_status<>'".$act_usu."'";
    $sql_estatus = "select * from tbl_estatus where id_status='$act_usu' order by id_status asc";
    $estatus_query =mysqli_query($conexion,$sql_estatus) or die(mysqli_error($conexion));    
    while($row_estatus = mysqli_fetch_array($estatus_query)){
      $estatus_usuario[$i]['id_status'] = $row_estatus['id_status'];
      $estatus_usuario[$i]['des_status'] = $row_estatus['des_status'];
      $i++;
    }     

    $whereC="where id_complejo<>'".$com_usu."'";
    $sql_complejo = "select * from tbl_complejo where id_complejo='$com_usu' order by id_complejo asc";
    $complejo_query =mysqli_query($conexion,$sql_complejo) or die(mysqli_error($conexion));    
    while($row_complejo = mysqli_fetch_array($complejo_query)){
      $complejo_usuario[$c]['id_complejo'] = $row_complejo['id_complejo'];
      $complejo_usuario[$c]['nombre_complejo'] = $row_complejo['nombre_complejo'];
      $c++;
    }  

    $whereG="where id_gerencia<>'".$ger_usu."'";
    $sql_gerencia = "select * from tbl_gerencia where id_gerencia='$ger_usu' order by id_gerencia asc";
    $gerencia_query =mysqli_query($conexion,$sql_gerencia) or die(mysqli_error($conexion));    
    while($row_gerencia = mysqli_fetch_array($gerencia_query)){
      $gerencia_usuario[$g]['id_gerencia'] = $row_gerencia['id_gerencia'];
      $gerencia_usuario[$g]['des_gerencia'] = $row_gerencia['des_gerencia'];
      $g++;
    }  

    $whereA="where id_area<>'".$are_usu."'";
    $sql_area = "select * from tbl_area where id_area='$are_usu' order by id_area asc";
    $area_query =mysqli_query($conexion,$sql_area) or die(mysqli_error($conexion));    
    while($row_area = mysqli_fetch_array($area_query)){
      $area_usuario[$a]['id_area'] = $row_area['id_area'];
      $area_usuario[$a]['des_area'] = $row_area['des_area'];
      $a++;
    } 
  }    
}  // ****************  FIN  de If de Ver Registro *************************

/**************************************************************************/
/**************************************************************************/

$sqlroles = "select * from tbl_rol $whereR order by id_rol asc";    
$usuario_queryroles =mysqli_query($conexion,$sqlroles) or die(mysqli_error($conexion));
$cantroles=mysqli_num_rows($usuario_queryroles);
while($row_roles = mysqli_fetch_array($usuario_queryroles)){
  $rol_usuario[$h]['id_rol'] = $row_roles['id_rol'];  
  $rol_usuario[$h]['des_rol'] = $row_roles['des_rol'];   
  $h++;
}  

$sql_estatus = "select * from tbl_estatus $whereS order by id_status asc";    
$estatus_query =mysqli_query($conexion,$sql_estatus) or die(mysqli_error($conexion));
$cantroestatus=mysqli_num_rows($estatus_query);
while($row_estatus = mysqli_fetch_array($estatus_query)){
  $estatus_usuario[$i]['id_status'] = $row_estatus['id_status'];  
  $estatus_usuario[$i]['des_status'] = $row_estatus['des_status'];   
  $i++;
} 

$sql_complejo = "select * from tbl_complejo $whereC order by id_complejo asc";    
$complejo_query =mysqli_query($conexion,$sql_complejo) or die(mysqli_error($conexion));
$cantrocomplejo=mysqli_num_rows($complejo_query);
while($row_complejo = mysqli_fetch_array($complejo_query)){
  $complejo_usuario[$c]['id_complejo'] = $row_complejo['id_complejo'];  
  $complejo_usuario[$c]['nombre_complejo'] = $row_complejo['nombre_complejo'];   
  $c++;
} 

$sql_gerencia = "select * from tbl_gerencia $whereG order by id_gerencia asc";    
$gerencia_query =mysqli_query($conexion,$sql_gerencia) or die(mysqli_error($conexion));
$cantrogerencia=mysqli_num_rows($gerencia_query);
while($row_gerencia = mysqli_fetch_array($gerencia_query)){
  $gerencia_usuario[$g]['id_gerencia'] = $row_gerencia['id_gerencia'];  
  $gerencia_usuario[$g]['des_gerencia'] = $row_gerencia['des_gerencia'];   
  $g++;
} 


$sql_area = "select * from tbl_area $whereA order by id_area asc";    
$area_query =mysqli_query($conexion,$sql_area) or die(mysqli_error($conexion));
$cantroarea=mysqli_num_rows($area_query);
while($row_area = mysqli_fetch_array($area_query)){
  $area_usuario[$a]['id_area'] = $row_area['id_area'];  
  $area_usuario[$a]['des_area'] = $row_area['des_area'];   
  $a++;
} 

?>