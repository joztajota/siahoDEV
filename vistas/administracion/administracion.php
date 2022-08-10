<?php 
if (!isset($_SESSION)) {
  session_start();
}


$id_rol=$_SESSION["id_rol"];
$mod=0;
include_once('funciones/funcionesGenerales/conecciones/MariaDB/connsisgm.php');


if(isset($_GET['filtro'])){
    $activo0=$_GET['filtro'];  
}
else{ $activo0='A'; }
$where0=" where act_usu ='$activo0'";
if (($_GET['filtro'])=='T' ){ $where0=0;  }


?>
<div class="container-fluid px-12">
    <div class="mb-2">
        <div class="mt-4" style="font-size: 1.75rem; color: #3e3e8c; font-weight: bold;">
        <img style="position: relative; center: 0px; top: 0px; width: 5%;" src="public/img/sistema/icon/cusuarios.png"/>
            &nbsp;&nbsp;<?php echo $titulo;  ?>
        </div>
    </div> 
    <ol class="breadcrumb mb-12 ms-12">
        <li class="breadcrumb-item"><a href="dashboard.php?activo=inicio">inicio</a></li>
        <li class="breadcrumb-item active">Gestión de Usuarios</li>
    </ol>      
    <div class="row">  
        <div class="col-xl-12">
            <div class="card mb-12">   
                <!-- ****** INICIO DE TABLA USUARIOS ******* -->
                <div class="card mb-2">
                    <div class="card-header text-danger">
                        <i class="fa fa-user"></i>
                        &nbsp;&nbsp;&nbsp;<b>USUARIOS DEL SISTEMA</b>
                    </div>
                </div>                                     
                
                <div class="row m-1 mt-3" style="border-bottom: 1px solid #ccc;"> <!--Fila para Agregar Usuario -->
                    <div class="col-xl-3"></div>
                    <div class="col-xl-3"></div>   
                    <div class="col-xl-3 mb-3">
                        <div class="card ">     
                            <div>
                                <button class="btn btn-block btn-primary" style="min-width: 100%; width:100%;  max-width: 100%;text-align: center" title="Agregar usuario" onclick="javascript:crear_usuario();" >
                                <i class="fa fa-plus-square"></i>
                                    Agregar Usuario 
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 mb-3">
                        <div class="card " > 
                            <div style="text-align: left">
                            <select  id="activo0" name="activo0" class="form-control" onchange="llamar_filtro()" >
                                    <option  <?php if ($activo0=='A'){echo " selected='selected'";}?> value="A">Activo</option>
                                    <option value="D" <?php if ($activo0=='D'){echo "selected='selected'";}?> >Desactivado</option>     
                                    <option value="T" <?php if ($activo0=='T'){echo "selected='selected'";}?> >Todos</option>                                                                                                   
                                </select>
                            </div>
                        </div>
                    </div>
                </div> <!-- Fin de Fila para Agregar Usuario -->

                <div class="row m-1"> <!--Fila para Agregar Usuario -->          
                    <!-- Tabla de usuarios  -->
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr >
                                    <th style=" text-align: center;">CEDULA</th>
                                    <th style=" text-align: center;">Nro. PERSONAL</th>
                                    <th style=" text-align: center;">NOMBRE</th>
                                    <th style=" text-align: center;">APELLIDO</th>
                                    <th style=" text-align: center;">ACTIVO</th>
                                    <th style=" text-align: center;">VISUALIZAR</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $conexion=dbcon();

                                if ($activo0!='T'){
                                    $sql = "select * from view_usuarios $where0 order by nom_usu asc";//echo $sql."<br/>";
                                }
                                else {
                                    $sql = "select * from view_usuarios usuario order by nom_usu asc";//echo $sql."<br/>";
                                }
                                $usuario_query =mysqli_query($conexion,$sql) or die(mysqli_error($conexion));

                                while($row_u = mysqli_fetch_array($usuario_query)){
                                    $id_usu = $row_u['id_usu'];
                                    $ced_usu = $row_u['ced_usu'];
                                    $npe_usu = $row_u['npe_usu'];
                                    $nom_usu = $row_u['nom_usu'];
                                    $ape_usu = $row_u['ape_usu'];
                                    $act_usu= $row_u['act_usu'];
                                    $mod=2;  
                                    if ($act_usu!='A'){
                                        $cuadrito="text-danger ";  //bg-danger
                                        $estilo= "font-weight: bold;";
                                        $texto="DESACTIVADO";
                                    
                                    }
                                    else {
                                        $cuadrito="background-color:#white; color: black;  ";
                                        $estilo= "font-weight: bold; color:blue";
                                        $texto="ACTIVO";                                                            
                                    }                                                      
                                ?>
                                    <tr>
                                        <td  style=" text-align: center;"><?php echo $ced_usu; ?></td>
                                        <td  style=" text-align: center;"><?php echo $npe_usu; ?></td>
                                        <td><?php echo  $nom_usu; ?></td>
                                        <td><?php echo $ape_usu; ?></td>
                                        <td  class="<?php echo $cuadrito; ?>" style="<?php echo $estilo; ?>"><center><span><?php echo $texto ?></span></center></td>
                                        <td  ><center><a id="<?php echo $id_usu; ?>" name="<?php echo $id_usu; ?>"  href='dashboard.php?activo=usuario&id_usu=<?php echo $id_usu; ?>&ced_usu=<?php echo $ced_usu; ?>&act_usu=<?php echo $act_usu; ?>&mod=<?php echo $mod; ?>' class="btn btn-block btn-info" style="width:100%;">Detalles</a></center></td>
                                    </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Fin Tabla de usuarios  -->                                
            </div>
        </div>   
    </div> 
</div>