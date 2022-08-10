<?php
session_start();
include( 'conecciones/MariaDB/connsisgm.php' );

class comprobacion_de_datos_crear_obra {   

   public $nombre_obra;
   public $fecha_inicio_obra;
   public $fecha_fin_estimado;
  // public $fecha_fin;
   public $tiempo;
   public $responsable;
   public $estado;
   public $comlejo;
   public $Unidad_Usuaria;
   public $inspector;
   public $estatus;

   function __construct($datos){ 
     $this->nombre_obra = $datos[ 'nombre_obra' ];
     $this->fecha_inicio_obra = $datos[ 'fecha_inicio_obra' ];
     $this->fecha_fin_estimado = $datos[ 'fecha_fin_estimado' ];
    // $this->fecha_fin =$datos[ 'fecha_fin' ];
     $this->tiempo =$datos[ 'tiempo' ];    
     $this->responsable = $datos[ 'responsable' ];
     $this->estado = $datos[ 'estado' ];
     $this->complejo = $datos[ 'complejo' ];
     $this->Unidad_Usuaria = $datos[ 'Unidad_Usuaria' ];
     $this->inspector = $datos[ 'inspector' ];    
     $this->estatus =$datos[ 'estatus' ];           
  }
 
  function valores_vacios(){
     if ( empty(trim($this->nombre_obra)) or empty(trim($this->fecha_inicio_obra)) or empty(trim($this->fecha_fin_estimado)) or
           empty(trim($this->tiempo)) or empty(trim($this->responsable))  or empty(trim($this->estado))  or empty(trim($this->complejo)) or empty(trim($this->Unidad_Usuaria)) or empty(trim($this->inspector)) or
            empty(trim($this->estatus)) ){

           return false ;             
     }else{             
           return true; 
     }
  } 

  function estado_validacion(){
      if ($this->estado!=0) {
         return true;
      }else {
         return false ;
      }    
   }

   function complejo_validacion(){

      if ($this->complejo!=0) {
         return true;
      }else {
         return false ;
      }    
   }

   function unidad_usuaria_validacion(){

      if ($this->Unidad_Usuaria!=0) {
         return true;
      }else {
         return false ;
      }    
   }

  function solo_letras(){    
     if (ctype_alpha(trim($this->nombre_obra)) and  ctype_alpha(trim($this->responsable)) and 
         ctype_alpha(trim($this->inspector)) and ctype_alpha(trim($this->estatus))  ) {         
         return true ;          
      }else{
           return false;  
     } 
  } 

   function fecha_inicio_obra(){     

     $fecha_inicio_compruebo = $this->fecha_inicio_obra;
     $anio = date("Y");
     $mes = date("m");
     $dia = date("d");
     
     $fecha_actual= $anio . "-" . $mes . "-" . $dia ;   
      if ($fecha_inicio_compruebo<$fecha_actual) {  
       return false;   
      }else{
         return true;    
      }
   }
   function fecha_fin_estimado(){     
      $fecha_fin_estimado_compruebo = $this->fecha_fin_estimado;
      $fecha_inicio_compruebo = $this->fecha_inicio_obra;
      $anio = date("Y");
      $mes = date("m");
      $dia = date("d");      
      $fecha_actual= $anio . "-" . $mes . "-" . $dia ;      
      if ($fecha_fin_estimado_compruebo<=$fecha_actual or $fecha_fin_estimado_compruebo<=$fecha_inicio_compruebo ) {   
        return false;    
       }else{
          return true;    
       }
    }
}

$datos = $_REQUEST;
$registro = new comprobacion_de_datos_crear_obra($datos);
$lista_comprovacion   = [];
$lista_comprovacion[] = $registro->valores_vacios();
$lista_comprovacion[] = $registro->estado_validacion();
$lista_comprovacion[] = $registro->complejo_validacion();
$lista_comprovacion[] = $registro->unidad_usuaria_validacion();
//$lista_comprovacion[] = $registro->solo_letras();
$lista_comprovacion[] = $registro->fecha_inicio_obra();
$lista_comprovacion[] = $registro->fecha_fin_estimado();
//$lista_comprovacion[] = $registro->fecha_fin_real();
//var_dump($lista_comprovacion);
// evaluo si hay algun error para devolverlo al frontend
$r= true;

foreach ($lista_comprovacion as $key) {  
 
   if ($key == false){     
      $r=false;        
      break;
   }
}

try {
   $r=true;
   if ($r==true) {
      $conexion = dbcon();

       $nombre_obra        = strtoupper($_REQUEST[ 'nombre_obra' ]);
       $fecha_inicio_obra  = $_REQUEST[ 'fecha_inicio_obra' ];
       $fecha_fin_estimado = $_REQUEST[ 'fecha_fin_estimado' ];
      // $fecha_fin          = $_REQUEST[ 'fecha_fin' ];
       $tiempo             = $_REQUEST[ 'tiempo' ];
       $responsable        = strtoupper($_REQUEST[ 'responsable' ]);
       $estado             = $_REQUEST[ 'estado' ];
       $complejo           = $_REQUEST[ 'complejo' ];
       $Unidad_Usuaria     = $_REQUEST[ 'Unidad_Usuaria' ];
       $inspector          = strtoupper($_REQUEST[ 'inspector' ]);
       $estatus            = strtoupper($_REQUEST[ 'estatus' ]);

       $sql = "insert into tbl_labor (labor_nombre ,
         labor_fechaInicio ,
         labor_fechafinEstimada ,        
         labor_tiempoDuracion ,
         labor_contratistaResponsable ,
         labor_estado,
         labor_complejo,
         labor_unidadUsuaria ,
         labor_inspector ,
         labor_status) values (? , ? , ? , ? , ? , ? , ? , ?, ?, ? )";
         
         $result1 = mysqli_prepare($conexion , $sql) or die(mysqli_error($conexion));

         $ok = mysqli_stmt_bind_param($result1 , 'sssssiiiss' , $nombre_obra ,  $fecha_inicio_obra , $fecha_fin_estimado , 
         $tiempo  , $responsable, $estado, $complejo , $Unidad_Usuaria , $inspector , $estatus );

         $ok = mysqli_stmt_execute($result1);
         // echo "prueba";
         $sql_calculo_id = "select * from tbl_labor ";
  
         $sql_calculo_id_query = mysqli_query( $conexion, $sql_calculo_id);
         $id = mysqli_num_rows( $sql_calculo_id_query  );      

         $clasificacion  = $_REQUEST[ 'clasificacion' ];
         $cantidad = $_REQUEST[ 'cantidad_Obra' ];
         
         $cantregistros = count($clasificacion);   
         if ($ok==true) {
            for ( $i = 0; $i < $cantregistros; $i++ ) {
               $clasificacionA =  $clasificacion[ $i ];
               $cantidadA = $cantidad[ $i ]; 
               $query6 = "insert into tbl_requerimiento (requerimiento_labor , requerimiento_oficio , requerimiento_cantidad) 
               values (? , ? , ? )";
               $result3 = mysqli_prepare( $conexion, $query6) or die(mysqli_error($conexion));
               $ok2 = mysqli_stmt_bind_param($result3 ,'isi' , $id, $clasificacionA  , $cantidadA );
               $ok2 = mysqli_stmt_execute($result3);
            } 
            echo $id;           
         } 
   }   
} catch (Exception $e) {
   echo false;
}

?>