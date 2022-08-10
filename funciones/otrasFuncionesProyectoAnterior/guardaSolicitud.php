<?php
session_start();
include( 'conecciones/MariaDB/connsisgm.php' );


//clase de validacion de datos , faltan los datos de DESCRIPCIÓN LABORAL


class comprobacion_de_datos {   

    public $aspirante_ced;
    public $aspirante_nombre;
    public $aspirante_fechNac ;
    public $aspirante_edad;
    public $aspirante_sexo;
    public $aspirante_telcelular ;
    public $aspirante_telcantv;
    public $aspirante_correo;
    public $id_estado;
    public $id_municipio  ;
    public $id_parroquia;
    public $id_nivelAcademiademico;
    public $id_clasificacion ;
    public $aspirante_fechReg ; 
 
   function __construct($datos){ 
      $this->aspirante_ced = $datos[ 'aspirante_ced' ];
      $this->aspirante_nombre = $datos[ 'aspirante_nombre' ];
      $this->aspirante_fechNac = $datos[ 'aspirante_fechNac' ];
      $this->aspirante_edad =$datos[ 'aspirante_edad' ];
      $this->aspirante_sexo =$datos[ 'aspirante_sexo' ];    
      $this->aspirante_telcelular = $datos[ 'aspirante_telcelular' ];
      $this->aspirante_telcantv = $datos[ 'aspirante_telcantv' ];
      $this->aspirante_correo = $datos[ 'aspirante_correo' ];    
      $this->id_estado =$datos[ 'id_estado' ];
      $this->id_municipio = $datos[ 'id_municipio' ];
      $this->id_parroquia = $datos[ 'id_parroquia' ];  
      $this->id_nivelAcademico = $datos[ 'id_nivelAcademico' ];  
      $this->id_clasificacion = $datos[ 'id_clasificacion' ];             
      $this->aspirante_fechReg = $datos[ 'aspirante_fechReg' ];      
   }
  
   function valores_vacios(){
      if (empty(trim($this->aspirante_ced)) or empty(trim($this->aspirante_nombre)) or empty(trim($this->aspirante_fechNac)) or empty(trim($this->aspirante_edad)) or
            empty(trim($this->aspirante_sexo)) or empty(trim($this->aspirante_telcelular)) or empty(trim($this->aspirante_telcantv)) or 
            empty(trim($this->aspirante_correo)) or empty(trim($this->id_estado)) or empty(trim($this->id_municipio)) or empty(trim($this->id_parroquia))
            or empty(trim($this->id_nivelAcademico)) or empty(trim($this->id_clasificacion))  or empty(trim($this->aspirante_fechReg))){

            return false ;             
      }else{             
            return true; 
      }
   } 
 
   function solo_numeros(){
      if(ctype_digit($this->aspirante_ced) and ctype_digit($this->aspirante_edad) and ctype_digit($this->aspirante_telcelular)  
      and ctype_digit($this->aspirante_telcantv) and  strlen($this->aspirante_ced)>=7){
         
         return true;    
      }else{             
         return false;
      } 
   }

   function solo_letras(){    
      if (ctype_alpha(trim($this->aspirante_nombre))) { 
         return true;            
      }else{
            return false;  
      } 
   }

   function numero_telefonico(){
         $parametro_telefono = "/^\(?(\d{4})\)?[-]?(\d{3})[-]?(\d{4})$/";
         if(preg_match($parametro_telefono , $this->aspirante_telcelular )){ 

            if (preg_match($parametro_telefono , $this->aspirante_telcantv )) {
               return true;
            }
         
      }else {             
         return false;
      }
   }

   function fecha_registro(){
      $anio = date("Y");       
      $mes = date("m"); 
      $dia = date("d");         
      $fecha_actual= $anio . "/" . $mes . "/" . $dia ;        
      
      if ($this->aspirante_fechReg <> $fecha_actual) {
         return false;  
      }else{ 
         return true;
      }      
   }
 
   function fecha_nacimiento(){
      $impedimento= 1900; 
      $anio = date("Y");
      $mes = date("m");
      $dia = date("d");
      
      $fecha_actual= $anio . "-" . $mes . "-" . $dia ;       
      $porciones= explode("-" , $this->aspirante_fechNac); 
      $anio_separado_de_fecha = $porciones[0];

      $cambio_anio= (int)$anio;
      $cambio_anio_separado_de_fecha = (int)$anio_separado_de_fecha;
      $resta = $cambio_anio - $cambio_anio_separado_de_fecha;
      
      if ($this->aspirante_fechNac >= $fecha_actual or $anio_separado_de_fecha<$impedimento or $resta<=17) {
         return false;
      }else{
         return true;
      } 
   }

   //checa si se puede agregar simbolos extraños al principio al final del correo
   function correo_electronico(){ 
      $parametro_correo= '/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/';         
      if (preg_match($parametro_correo , $this->aspirante_correo )) { 
         return true; 
      }else{ 
         return false;
      }
   }
}

$datos = $_REQUEST;

$registro = new comprobacion_de_datos($datos);
$lista_comprovacion   = [];
$lista_comprovacion[] = $registro->valores_vacios();
$lista_comprovacion[] = $registro->solo_numeros();
$lista_comprovacion[] = $registro->numero_telefonico();
$lista_comprovacion[] = $registro->fecha_registro();
$lista_comprovacion[] = $registro->fecha_nacimiento();
$lista_comprovacion[] = $registro->correo_electronico();

// evaluo si hay algun error para devolverlo al frontend
$r= true;


foreach ($lista_comprovacion as $key) {    
   if ($key == false){     
      $r=false;        
      break;
   }
}



$aspirante_ced = $_REQUEST[ 'aspirante_ced' ];

$foto = true ;

try {

   if ($_FILES['archivo']){
      $subir_archivo=basename($_FILES['archivo']['name']);
   }
   else {
         $subir_archivo="2";
   }
  
   $directorio = 'SoportesAspirantes/';
   $subir_archivo = $directorio.basename($_FILES['archivo']['name']);
  
   if (move_uploaded_file($_FILES['archivo']['tmp_name'], $subir_archivo)) {
      $foto = true;
   }
   else{
      $foto =false;
   }
  
   if ($r==true and $foto==true) {
     $conexion = dbcon();
    
     $usersolicitud = $_SESSION[ "id_user" ];
     $fecha = date( "Y-m-d" ); 
     $hora = date( "H:i:s" );
  
     // nueva tabla aspirante ________________________________________________

     $sql_calculo_id = "select * from tbl_aspirante ";
  
     $sql_calculo_item_query = mysqli_query( $conexion, $sql_calculo_id);
     $item_aspirante = mysqli_num_rows( $sql_calculo_item_query  );    $item_aspirante=$item_aspirante+1;

  
     $aspirante_ced = $_REQUEST[ 'aspirante_ced' ];
     $aspirante_nombre = strtoupper($_REQUEST[ 'aspirante_nombre' ]);
     $aspirante_fechNac = $_REQUEST[ 'aspirante_fechNac' ];
     $aspirante_sexo = $_REQUEST[ 'aspirante_sexo' ];
     $aspirante_fechacrea = $_REQUEST[ 'aspirante_fechReg' ];
     $aspirante_usucrea= $_REQUEST[ 'aspirante_ced' ]; // cedula en caso de que sea alguien externo que esta creando el registro
     $aspirante_status = "REGISTRADO";
  
     $sql = "insert into tbl_aspirante(
     aspirante_cedula,
     aspirante_nombre,
     aspirante_fechNac,
     aspirante_sexo,
     aspirante_fechacrea,
     aspirante_usucrea,
     aspirante_item)     
     values(? , ? , ? , ? , ? , ? ,?)";
     $result1 = mysqli_prepare($conexion, $sql) or die(mysqli_error($conexion));
     $ok = mysqli_stmt_bind_param($result1 , "ssssssi" , $aspirante_ced , $aspirante_nombre , $aspirante_fechNac , $aspirante_sexo, 
     $aspirante_fechacrea ,  $aspirante_usucrea,$item_aspirante );
     $ok = mysqli_stmt_execute($result1);
  
      if ($ok== true) {   
        
         // guardado en la tabla de registro----------------------------------------
        $registro_cedula = $_REQUEST[ 'aspirante_ced' ];
        $registro_edad = $_REQUEST[ 'aspirante_edad' ];
        $registro_telcelular = $_REQUEST[ 'aspirante_telcelular' ];
        $registro_telcantv = $_REQUEST[ 'aspirante_telcantv' ];
        $registro_correo = $_REQUEST[ 'aspirante_correo' ];
        $registro_estado = $_REQUEST[ 'id_estado' ];
        $registro_municipio = $_REQUEST[ 'id_municipio' ];
        $registro_parroquia = $_REQUEST[ 'id_parroquia' ];
        $registro_nivelAcademico = $_REQUEST[ 'id_nivelAcademico' ];
        $registro_clasificacion = $_REQUEST[ 'id_clasificacion' ];
        $registro_fechacrea = $_REQUEST[ 'aspirante_fechReg' ];
        $registro_usucrea= $_REQUEST[ 'aspirante_ced' ]; // cedula en caso de que sea alguien externo que esta creando el registro
        $registro_status = "REGISTRADO";     
        $registro_validaPCP = "PENDIENTE";
        $registro_validaSalud = "PENDIENTE";   
        $registro_codigo  = $registro_cedula . '_' . '1';
        $sql = "insert into tbl_registro(
           registro_codigo,
           registro_edad,
           registro_telcelular,
           registro_telcantv,
           registro_correo,
           registro_estado,
           registro_municipio,
           registro_parroquia,
           registro_nivelAcademico,
           registro_fechacrea,
           registro_usucrea,
           registro_status,
           registro_cedula,
           registro_validaPCP,
           registro_validaSalud)
           values(? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ?)";
        $result2 = mysqli_prepare($conexion, $sql) or die(mysqli_error($conexion));
        $ok2 = mysqli_stmt_bind_param($result2 , "sisssiiiissssss" , $registro_codigo , $registro_edad , $registro_telcelular,  $registro_telcantv , $registro_correo ,
        $registro_estado , $registro_municipio , $registro_parroquia , $registro_nivelAcademico , $registro_fechacrea ,
        $registro_usucrea, $registro_status, $registro_cedula ,$registro_validaPCP , $registro_validaSalud);
        $ok2 = mysqli_stmt_execute($result2);
      }
  
      // GUARDAR LOS DETALLES DE LOS ACTIVOS   ////
      $experiencia_ente_o_empresa = $_REQUEST[ 'experiencia_ente_o_empresa' ];
      $experiencia_fecha_desde = $_REQUEST[ 'experiencia_fecha_desde' ];
      $experiencia_fecha_hasta = $_REQUEST[ 'experiencia_fecha_hasta' ];
      $experiencia_tiempo = $_REQUEST[ 'experiencia_tiempo' ];
      $experiencia_lugar_oficio = $_REQUEST[ 'experiencia_lugar_oficio' ];
      $cantregistros = count( $experiencia_ente_o_empresa );   
      if ($ok== true) {
         for ( $i = 0; $i < $cantregistros; $i++ ) {
            $experiencia_ente_o_empresaA = strtoupper($experiencia_ente_o_empresa[ $i ]);
            $experiencia_fecha_desdeA = $experiencia_fecha_desde[ $i ];
            $experiencia_fecha_hastaA = $experiencia_fecha_hasta[ $i ];
            $experiencia_tiempoA = $experiencia_tiempo[ $i ];
            $experiencia_lugar_oficioA = strtoupper($experiencia_lugar_oficio[ $i ]);
            $item = $i;
            $item++;
            $query6 = "insert into tbl_experiencia (experiencia_registro,experiencia_oficio,experiencia_empresa,
            experiencia_fecha_desde,experiencia_fecha_hasta,experiencia_tiempo,experiencia_lugar,experiencia_item) 
            values (?,?,?,?,?,?,?,?)";
            $result3 = mysqli_prepare( $conexion, $query6) or die(mysqli_error($conexion));
            $ok3 = mysqli_stmt_bind_param($result3 ,'sisssssi' ,$registro_codigo,$registro_clasificacion,$experiencia_ente_o_empresaA , $experiencia_fecha_desdeA ,
                                       $experiencia_fecha_hastaA , $experiencia_tiempoA , $experiencia_lugar_oficioA,$item);
            $ok3 = mysqli_stmt_execute($result3);
         }            
      }    
      echo $aspirante_ced;       
   }    // $r y $foto
} catch (Exception $e) {
   echo 5;
}
   
?>