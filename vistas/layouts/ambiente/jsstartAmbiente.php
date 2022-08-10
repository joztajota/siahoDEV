

<!--  **********    SCRIPTS SOLO PARA REGISTRO DETALLESDE INSPECCIÓN EN AMBIENTE    **************************       --> 

<script language="javascript">

function fileValidationJPG(archivo){
  var fileInput =archivo;
  var filePath = fileInput.value;
  var allowedExtensions = /(.jpg)$/i;
  if(!allowedExtensions.exec(filePath)){
      
      fileInput.value = '';
      return false;
    }else{
      return true;
    }
}
function guardarinspeccionAHO_inspeccion() {  
  var permite =1;
  //validando fecha 
  if ($("#incidencia_complejo").val()==0){
      permite =0;
      alertify.error("Seleccione un Complejo");
  }

  if ($("#incidencia_gerencia").val()==0){
      permite =0;
      alertify.error("Seleccione una Gerencia");
  }
  if ($("#incidencia_area").val()==0){
      permite =0;
      alertify.error("Seleccione un Area");
  }

  var valor = $("#incidencia_fecha").val();
  var proceso =  validar_fecha_nacimiento(valor);
  //alert("fecha: "+proceso);
  if (!proceso) {
    permite=0;
    alertify.error("Ingrese una fecha correcta");
  }
  if ($("#incidencia_estatus").val()==""){
      permite =0;
      alertify.error("Ingrese un Estatus");
  }  
  if ($("#incidencia_custodio").val()==0){
    permite =0;
    alertify.error("Ingrese un Custodio");
  }  
  if ($("#incidencia_hallazgo").val()==0){
    permite =0;
    alertify.error("Seleccione un Hallazgo");
  }
  if ($("#incidencia_recomendacion").val()==""){
    permite =0;
    alertify.error("Ingrese Recomendación");
  }
  if ($("#incidencia_responsable").val()==""){
    permite =0;
    alertify.error("Ingrese Responsable");
  }

  //--------------------
  var archivo = $("#archivo").val();
  if (archivo == "") {
    permite=0;
    alertify.error("Debe adjuntar soporte ");
  }
  else{
    var tipo_archivo = fileValidationJPG(archivo);
    if (tipo_archivo == false) {
      permite=0;
      alertify.error("el archivo debe ser JPG");  
    }
  }
 
  if (permite ==1) {  
    var fd = new FormData(document.getElementById("form2"));
    $.ajax({
      type: "POST",
      url: "funciones/guardaSolicitud.php",
      data: fd,
      processData: false,  // tell jQuery not to process the data
      contentType: false,
      success: function (r) {
	   // alert("R es: "+r);
        if (r == false ) {
          alert("ERROR: Por Favor Revise los datos de su Formulario ");  
        } 
        else {
          if(r != ''){
            alert("Su registro se ha realizado con éxito")
            window.location.replace("dashboard.php?activo=registrar&bandera=2&aspirante_cedula="+r); 
          }        
        }
      }
    }); 
  }
}  
function guardarinspeccionAHO_diagnostico() {  
  var permite =1;

  if ($("#diagnostico_complejo").val()==0){
      permite =0;
      alertify.error("Seleccione un Complejo");
  }

  if ($("#diagnostico_gerencia").val()==0){
      permite =0;
      alertify.error("Seleccione una Gerencia");
  }
  if ($("#diagnostico_area").val()==0){
      permite =0;
      alertify.error("Seleccione un Area");
  }
  if ($("#diagnostico_aspectos").val()==0){
    permite =0;
    alertify.error("Ingrese un Aspecto");
  }
  if ($("#disgnostico_custodio").val()==0){
    permite =0;
    alertify.error("Ingrese un Custodio");
  }
  //validando fecha 
  var valor = $("#diagnostico_fecha").val();
  var proceso =  validar_fecha_nacimiento(valor);
  if (!proceso) {
    permite=0;
    alertify.error("Ingrese una fecha correcta");
  }
  if ($("#diagnostico_condiciones").val()==""){
      permite =0;
      alertify.error("Ingrese Condiciones");
  }
  if ($("#diagnostico_estatus").val()==""){
      permite =0;
      alertify.error("Ingrese un Estatus");
  }  
  
  if ($("#diagnostico_hallazgo").val()==0){
    permite =0;
    alertify.error("Seleccione un Hallazgo");
  }
  if ($("#diagnostico_recomendacion").val()==""){
    permite =0;
    alertify.error("Ingrese Recomendación");
  }
 
  //--------------------
  var archivo = $("#archivo").val();
  if (archivo == "") {
    permite=0;
    alertify.error("Debe adjuntar soporte ");
  }
  else{
    var tipo_archivo = fileValidationJPG(archivo);
    if (tipo_archivo == false) {
      permite=0;
      alertify.error("el archivo debe ser JPG");  
    }
  } 

  if (permite ==0) {  
    alert("Guardando Archivo");
    var fd = new FormData(document.getElementById("form2"));
    $.ajax({
      type: "POST",
      url: "funciones/AHO/ambiente/guardaambiente.php",
      data: fd,
      processData: false,  // tell jQuery not to process the data
      contentType: false,
      success: function (r) {
	    alert("R es: "+r);
        if (r == false ) {
          alert("ERROR: Por Favor Revise los datos de su Formulario ");  
        } 
        else {
          if(r != ''){
            alert("Su registro se ha realizado con éxito: "+r)
            window.location.replace("dashboard.php?activo=registrar&bandera=2&aspirante_cedula="+r); 
          }        
        }
      }
    }); 
  }



}  





</script>




