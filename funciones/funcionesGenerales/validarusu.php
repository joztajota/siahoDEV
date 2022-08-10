<?php
  if (!isset($_SESSION)) {
  session_start();  }


/*///////////////////////////////////////////////////////////////////////////////////////////////////////
login.php, se conecta al directorio activo usando ldap.php, para luego validar el usuario con la tabla web_usuarios y permitir o negar el acceso  

Desarrolado: Ing. Francisco Puerta
Area:        AIT ING. DE SOFTWARE
Empresa:     Pequiven
creado:  19-02-2019
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

//llamo al archivo de coneccion 
include_once('conecciones/MariaDB/connsisgm.php');
require("conecciones/ldap.php");

//llamo a la funcion de coneccion 
$conexion=dbcon();
//llamo al archivo de conexion ldap (autentificación windows)

header("Content-Type: text/html; charset=utf-8");
$usr = $_POST["user"];

if (($usr =="")&&($_POST["password"]=="")){   
	header("Location:../../index.php");
	exit;	

}

include_once('pruebaconUsuarios.php');

//*********   MODIFICADO POR BELKIS MERCHÁN **** */
$sql = "select * from view_usuarios where log_usu='".$usr."' ";
$result=mysqli_query($conexion,$sql);
$ver=mysqli_fetch_array($result);
$dato = mysqli_num_rows($result);
if($dato==0){ // No está Autorizado
	header("Location:../../index.php?mensaje=DISCULPE, Sr. '.$usr.', USTED NO ESTA AUTORIZADO");
	exit;
}
else { // esta en la BD 

	$login = mailboxpowerloginrd($usr,$_POST["password"]);
	if($login == "0" || $login == ''){ // No es trabajador Pequiven
		$_SERVER = array();
		$_SESSION = array();
		header("Location:../../index.php?mensaje=REGISTRO NO EXISTE");
		}
	else{  // está en BD y en el ldap
			$id_user = $ver["id_usu"];
			$nombre = $ver["nom_usu"];
			$apellido = $ver["ape_usu"];
			$ced_usu = $ver["ced_usu"];												
			$id_rol = $ver["rol_usu"];
			$activo = $ver["act_usu"];		
			$complejo=$ver["com_usu"];
			$siglas_complejo=$ver["siglas_complejo"];
			$nombre_complejo=$ver["nombre_complejo"];

			$_SESSION["id_user"] = $id_user;
			$_SESSION["usuario"] = $nombre." ".$apellido;
			$_SESSION["ced_usu"] = $ced_usu;
			$_SESSION["id_rol"] = $id_rol;
			$_SESSION["act_usu"] = $activo;						
			$_SESSION["id_complejo"] = $complejo;
			$_SESSION["siglas_complejo"] = $siglas_complejo;
			$_SESSION["nombre_complejo"] = $nombre_complejo;

			$_SESSION['login']=$login;
			if ($activo=="A"){ header("Location:../../dashboard.php");	}

			if ($activo!="A"){ header("Location:../../index.php?mensaje=USTED NO ESTA ACTIVO");}					
		//}//}else  				
	} 
}
?>
