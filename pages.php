<?php 
$titulo="";
$cuerpo='vistas/principal.php';
$accion=@$_GET['activo'];
if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
		$_SESSION['MM_Username'] = NULL;
 		$_SESSION["usuario"] = NULL;
  		$_SESSION["id_rol"]= NULL;
  		$_SESSION["perfil"] = NULL;
  		$_SESSION["id_user"] = NULL;
  		$_SESSION["id_complejo"]= NULL;
  		unset($_SESSION['MM_Username']);
  		unset($_SESSION["usuario"]);
  		unset($_SESSION['id_rol']);
  		unset($_SESSION['perfil']);
  		unset($_SESSION['id_user']);
  		unset($_SESSION['id_complejo']);
  		header("Location:../../index.php");
		exit;		
	}

if ($accion == "inicio"){	
	$cuerpo='vistas/principal.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "cerrar"){	
	$cuerpo='../funciones/funcionesGenerales/cerrarsesion.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "admon_usu"){	
	$titulo="Administración de Usuarios";
	$cuerpo='vistas/administracion/administracion.php';		
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "usuario"){	
	$cuerpo='vistas/administracion/addusuario.php';		
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "construccion"){	
	$cuerpo='vistas/paginaenConstruccion.php';		
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

/*********************** Vista Pricipal de Planificación  ****************/

if ($accion == "pycontrol"){	
	$cuerpo='vistas/pyg/principalplanificacion.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

/************************* Vista Pricipal de SP  ************************/

if ($accion == "sp"){	// Pantalla Inicial Segurida dde los Procesos
	$cuerpo='vistas/sp/principalsp.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "si"){	// Pantalla de Seguridad Industrial
	$cuerpo='vistas/sp/seguridadIndustrial.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

/******************* Vista Pricipal de ADyCN  *************************/

if ($accion == "adcn"){	//Pantalla Inicial ADyCN
	$cuerpo='vistas/adycn/principaladcn.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "24hj"){	// Reporte 24 H
	$cuerpo='vistas/adycn/Reporte24H.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "mp"){	// Pantalla Materiales Peligrosos
	$cuerpo='vistas/adycn/principaladcnmp.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "sci"){	// PAntalla de Sistemas Contra Incendio
	$cuerpo='vistas/adycn/principaladcnsci.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "ad"){	// Pantalla de Administración de Desastres
	$cuerpo='vistas/adycn/principaladcnad.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

/****************************   Vista Principal de AHO   *******************/

if ($accion == "aho"){	// Pantalla Inicial de AHO
	$cuerpo='vistas/aho/principalaho.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}


if ($accion == "ambiente"){	  // Pantalla de Ambiente
	$cuerpo='vistas/aho/ambiente/principalambiente.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}


if ($accion == "inspeccionesambiente"){	  // Pantalla de Inspecciones Ambiente
	$cuerpo='vistas/aho/ambiente/principalinspeccionesambiente.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "reporteinspeccionesambientales"){	  // Pantalla de Inspecciones Ambiente
	$titulo="Reporte de Inspección";
	$cuerpo='vistas/aho/ambiente/registroinspecciones.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "reportediagnosticosambientales"){	  // Pantalla de Inspecciones Ambiente
	$titulo="Diagnóstico Ambiental";
	$cuerpo='vistas/aho/ambiente/registrodiagnosticos.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}
if ($accion == "pambientales"){      // Pantalla de Proyectos Ambientales
	$cuerpo='vistas/aho/ambiente/principalpambientales.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

if ($accion == "ho"){      // Pantalla de Higiene Ocupacional
	$cuerpo='vistas/aho/ambiente/principalho.php';	
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

/* ***************  PROYECTO Y MANUALES   ******************************/

if ($accion == "fotos"){	
	$titulo="Galeria de Fotos";
	$cuerpo='vistas/proyecto/galeriadeFotos.php';		
	$volver="<li><a href='index.php?activo=dashboard'><i class='fa fa-dashboard'></i> Volver</a></li>
            <li class='active'>Inicio</li>";
}

?>