<script language="javascript">
      
function chequeo1(){
    if ($('input:radio[name=id_retorna]:checked').val()=="SI"){
    //alert('si');   
    document.getElementById('divfecharetorna').style.visibility='visible';
    }
    else{
          // alert('no'); 
      document.getElementById('divfecharetorna').style.visibility='hidden';   
    }
}
function eliminar(){
    var n_control='<?php echo $n_control_m;?>';
    
    //var modal = $("#cancelar_solicitud");
    $("#cancelar_solicitud").modal("show");
    $("#cancelar_solicitud").find('.modal-title').text("Cancelar Solicitud: " + n_control );
    $("#ncontrol_c").val(n_control );                                                   
    //alert("jhhhj");
    //$("#"+modal).modal("show");
    
}
function cerrar_modal(valor){
  $('#'+valor).modal('hide');

}
function cancelar_orden(){
    var permite=1
    var ncontrol_c=$("#ncontrol_c").val();
    var observacion=$("#ob1").val();
    if (observacion==''){
        alertify.error("Para Anular la solicitud debe colocar una Observación");
        permite=0;
    }
    if ( permite==1){
        
    var datos= {ncontrol_c: ncontrol_c,ob1:observacion,bandera:'anular'}
    $.ajax({
      type: "POST",
      url: "./../funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {
        //alert(r);
          //var bandera=(r.substr(0, 2));
          //alert(bandera);
        if ( r == '1') {              
          // alert("se cancelo");
                // reinicia();
            eval("document.location='emisolicitudes.php'");
                }else {
          alert("Error al editar solicitante " +"#"+r+"#");

        }
      }
    }); 

        
    }
    
}

function modificar() {

var n_control='<?php echo $n_control_m;?>';
//  alert('entre');
  var permite =1;

  //permite =1;
  
  if ($("#id_pase").val()==""){
    permite =0;
    alertify.error("Seleccione Tipo de Pase");
  }

  if ($('input:radio[name=id_retorna]:checked').val()=="SI"){
    if ($("#fecharetorna").val()==""){
      permite =0;
      alertify.error("Seleccione la Fecha de Retorno");
    } 
  }

  if ($('input:radio[name=tip_propietario]:checked').val()=="PART"){
    if ($("#descparticular").val()==""){
      permite =0;
      alertify.error("Escriba un Nombre o Descripción del Particular");
    } 
  }

  if ($("#origen").val()==""){
    permite =0;
    alertify.error("Seleccione el Origen");
  }

  if ($("#origen").val()=="12"){
    if ($("#origen_descrip").val()==""){
      permite =0;
      alertify.error("Escriba la Descripcioón del Origen");          
    } 
  }

  if ($("#destino").val()==""){
    permite =0;
    alertify.error("Seleccione el Destino");
  }

  if ($("#destino").val()=="12"){
    if ($("#destino_descrip").val()==""){
      permite =0;
      alertify.error("Escriba la Descripcioón del Destino");
    } 
  }

  if ($("#id_razon").val()==""){
    permite =0;
    alertify.error("Seleccione la Razón del Traslado");
  }

  if ($("#ced_portador").val()==""){
    permite =0;
    alertify.error("Escriba la Cédula del Portador");
  }
  if ($("#nom_portador").val()==""){
    permite =0;
    alertify.error("Escriba Nombre del Portador");
  }
  if ($("#tel_portador").val()==""){
    permite =0;
    alertify.error("Escriba un Número de Telefóno del Portador");
  }

  if ($("#id_vehiculo").val()==""){
    permite =0;
    alertify.error("Seleccione el Tipo de Trasnporte");
  }

  /*if ($("#ced_chofer").val()==""){
    permite =0;
    alertify.error("Escriba la cédula del Chofer");
  }*/
  /*if ($("#nom_chofer").val()==""){
    permite =0;
    alertify.error("Escriba Nombre del Chofer");
  }*/
  if ($("#correo_portador").val()==""){
    permite =0;
    alertify.error("Introduzca el correo del portador");
  }    
  if (permite ==1) {  
    var datos = $('#form2').serialize()+"&n_control="+n_control+"&bandera=editar";
    //alert(datos);

//    var datos= {solicitante: solicitante,aprobador:aprobador,accion1:'guarda_flujo'}
    $.ajax({
      type: "POST",
      url: "./../funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {
        //alert(r);
          var bandera=(r.substr(0, 2));
          //alert(bandera);
        if ( bandera == '1#') {
          var registro=r.substr(2);
          window.location.replace("../funciones/llamaregistroPlanilla.php?ncontrol="+registro);
        // reinicia();

        } else {
          alert("Error al asignar solicitante " +"#"+r+"#");

        }
      }
    }); 
  }
}
  function ver_planilla(n_control){  
      //alert(n_control);
    //     eval("document.location='../funciones/llamaSolicitud.php?ncontrol="+n_control+"'");	
    window.open("../funciones/llamaPlanilla.php?ncontrol="+n_control, "Planilla Solicitud" , "width=+screen.width,height=+screen.height,scrollbars=YES")	
}
function sap1(){
    var url="../funciones/buscarSap.php";
    var cedula =$("#ced_portador").val();
    $.getJSON(url,{cedula : cedula, busca_user: "busca_user" },function(empleado){
        $("#nom_portador").val('');
              //$("#ced_portador").val('');
              $("#tel_portador").val('');
              $("#correo_portador").val('');
  $.each(empleado, function(i,empleados){
              $("#nom_portador").val(empleados.nombre_empleado);
              $("#ced_portador").val(empleados.cedula);
              $("#tel_portador").val(empleados.telefono);
            //alert(empleados.correo_personal);
              $("#correo_portador").val(empleados.numero_personal+"/"+empleados.correo_personal);
            });
});

    
}
function sap2(){
    var url="../funciones/buscarSap.php";
    var cedula =$("#ced_chofer").val();
    $.getJSON(url,{cedula : cedula, busca_user: "busca_user" },function(empleado){
    $("#nom_chofer").val('');
        //$("#ced_chofer").val('');
  $.each(empleado, function(i,empleados){
            $("#nom_chofer").val(empleados.nombre_empleado);
            $("#ced_chofer").val(empleados.cedula);
            
            });
});

    
}


function aprobar(){
    var solicitud='<?php echo $n_control_m;?>';
    alertify.confirm('Aprobar Solicitud', 'Esta seguro que desea aprobar la Solicitud '+solicitud+' ?',function () { aprueba_solicitud(); }, function () { alertify.error('Se cancelo la Aprobación') }).set('labels', { ok: 'Aprobar', cancel: 'Cancelar' });
}

function aprueba_solicitud(){
    
    var ncontrol_c='<?php echo $n_control_m;?>';      
        
    var datos= {ncontrol_c: ncontrol_c,bandera:'aprobar'}
    $.ajax({
      type: "POST",
      url: "./../funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {
        //alert(r);
          //var bandera=(r.substr(0, 2));
          //alert(bandera);
        if ( r == '1') {              
          // alert("se cancelo");
                // reinicia();
            eval("document.location='aprobaciones.php'");
                }else {
                    
          alert("Error al editar solicitante " +"#"+r+"#");

        }
      }
    });         
    
}
function rechazar(){
    var n_control='<?php echo $n_control_m;?>';
    
    //var modal = $("#cancelar_solicitud");
    $("#rechazar_solicitud").modal("show");
    $("#rechazar_solicitud").find('.modal-title').text("Rechazar Solicitud: " + n_control );
    $("#ncontrol_r").val(n_control );                                                   
    //alert("jhhhj");
    //$("#"+modal).modal("show");
    
}
function rechazar_orden(){
    var permite=1
    var ncontrol_c=$("#ncontrol_r").val();
    var observacion=$("#ob2").val();
    if (observacion==''){
        alertify.error("Para Rechazar la solicitud debe colocar una Observación");
        permite=0;
    }
    if ( permite==1){
        
    var datos= {ncontrol_c: ncontrol_c,ob1:observacion,bandera:'rechazar'}
    $.ajax({
      type: "POST",
      url: "./../funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {
        //alert(r);
          //var bandera=(r.substr(0, 2));
          //alert(bandera);
        if ( r == '1') {              
          // alert("se cancelo");
                // reinicia();
            eval("document.location='aprobaciones.php'");
                }else {
          alert("Error al editar Solicitud " +"#"+r+"#");

        }
      }
    }); 

        
    }
    
}
/* MODULO VERIFICADOR: VERIFICAR Y RECHAZAR SOLICIUTD    */

function verificado(){
var n_control='<?php echo $n_control_m;?>';
//alert(n_control);
//
  //var modal = $("#cancelar_solicitud");
$("#ncontrol_c1").val(n_control );  
$("#verificado_solicitud").modal("show");
$("#verificado_solicitud").find('.modal-title').text("Verificar Solicitud: " + n_control );

}
function verificar(){
    var n_control='<?php echo $n_control_m;?>';
    alertify.confirm('Aprobar Solicitud', 'Esta Seguro que la Solicitud: '+n_control+' esta verificada?',function () { visto_bueno(); }, function () { alertify.error('Se cancelo la Verificación') }).set('labels', { ok: 'Verificar', cancel: 'Cancelar' });
}
function verificado2(){
var n_control='<?php echo $n_control_m;?>';
//  alertify.confirm('Aprobar Entrada', 'Esta Seguro de Aprobar la Entrada: '+solicitud+'?',function () { visto_bueno2(); }, function () { alertify.error('Se cancelo la Aprobaci�n') }).set('labels', { ok: 'Aprobar Entrada', cancel: 'Cancelar' });
$("#verificar_entrada").modal("show");
$("#verificar_entrada").find('.modal-title').text("Verificar Entrada: " + n_control );
$("#ncontrol_r").val(n_control );  
}      

function salida_verificada(){
var solicitud='<?php echo $n_control_m;?>';
alertify.confirm('Aprobar Entrada', 'Esta Seguro de Aprobar la Entrada: '+solicitud+'?',function () { visto_bueno2(); }, function () { alertify.error('Se cancelo la Aprobación') }).set('labels', { ok: 'Aprobar Entrada', cancel: 'Cancelar' });
}


function visto_bueno(){

var ncontrol_c='<?php echo $n_control_m;?>';  
var puerta_salida=$("#puerta_salida").val();

    
var datos= {ncontrol_c: ncontrol_c,bandera:'verificar',puerta_salida:puerta_salida}
$.ajax({
  type: "POST",
  url: "./../funciones/editarSolicitud.php",
  data: datos,
  success: function (r) {
    //alert(r);
      //var bandera=(r.substr(0, 2));
      //alert(bandera);
    if ( r == '1') {              
      // alert("se cancelo");
            // reinicia();
        eval("document.location='verificaciones.php'");
            }else {
      alert("Error al Verificar solicitante " +"#"+r+"#");

    }
  }
});         

}
function visto_bueno2(){
var tipo_entrada='CONFORME';
var ncontrol_c='<?php echo $n_control_m;?>';  
var puerta_entrada=$("#puerta_entrada").val();
    
var datos= {ncontrol_c: ncontrol_c,puerta_entrada: puerta_entrada,bandera:'entrada',tipo_entrada:tipo_entrada}
$.ajax({
  type: "POST",
  url: "./../funciones/editarSolicitud.php",
  data: datos,
  success: function (r) {
    //alert(r);
      //var bandera=(r.substr(0, 2));
      //alert(bandera);
    if ( r == '1') {              
      // alert("se cancelo");
            // reinicia();
        eval("document.location='verificaciones.php'");
            }else {
      alert("Error al aprobar entrada solicitante " +"#"+r+"#");

    }
  }
});         

}    

function visto_bueno3(){
var tipo_entrada='NO CONFORME';
var ncontrol_c='<?php echo $n_control_m;?>';  
var observaciones_entrada=$("#observaciones_entrada").val();
var permite=1;
  var puerta_entrada=$("#puerta_entrada2").val();
if (observaciones_entrada==''){
      alert("Error: Las Observaciones son obligatorias");
    permite=0;
}
  if (permite==1) {  
var datos= {observaciones_entrada:observaciones_entrada,ncontrol_c: ncontrol_c,puerta_entrada: puerta_entrada,bandera:'entrada',tipo_entrada:tipo_entrada}
$.ajax({
  type: "POST",
  url: "./../funciones/editarSolicitud.php",
  data: datos,
  success: function (r) {
    //alert(r);
      //var bandera=(r.substr(0, 2));
      //alert(bandera);
    if ( r == '1') {              
      // alert("se cancelo");
            // reinicia();
        eval("document.location='verificaciones.php'");
            }else {
      alert("Error al aprobar entrada solicitante " +"#"+r+"#");

    }
  }
});         
  }
}        
function rechazo_verificador(){
var n_control='<?php echo $n_control_m;?>';

//var modal = $("#cancelar_solicitud");
$("#rechazar_solicitud").modal("show");
$("#rechazar_solicitud").find('.modal-title').text("Rechazar Solicitud: " + n_control );
$("#ncontrol_r").val(n_control );                                                   
//alert("jhhhj");
//$("#"+modal).modal("show");

}

function rechazar_orden_verificador(){
    var permite=1
    var ncontrol_c='<?php echo $n_control_m;?>';
    var observacion=$("#ob4").val();
alert(observacion);
    if (observacion==''){
        alertify.error("Para Rechazar la solicitud debe colocar una Observación");
        permite=0;
    }
    if ( permite==1){
        
    var datos= {ncontrol_c: ncontrol_c,observacion_r:observacion,bandera:'rechazar_verificador'}
    $.ajax({
      type: "POST",
      url: "./../funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {
        //alert(r);
          //var bandera=(r.substr(0, 2));
          //alert(bandera);
        if ( r == '1') {              
          // alert("se cancelo");
                // reinicia();
          eval("document.location='verificaciones.php'");
        }else {
          alert("Error al Rechazar la Solicitud " +"#"+r+"#");
        }
      }
    }); 

        
    }
    
}








/* VERIFICA QUE LA FECHA SEA MAYOR O IGUAL QUE LA ACTUAL  */

function verifica_fecha(fechaseleccionada){
  
var fecha=$(fechaseleccionada).val();
    

function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
var d = new Date();
var day = addZero(d.getDate());
var month = addZero(d.getMonth()+1);
var year = addZero(d.getFullYear());
fechaactual= year + "-" + month + "-" + day
// alert( day + "/ " + month + "/ " + year);
//alert(fechaactual);

if (fecha<fechaactual) {

alert ("Por favor corrija, la fecha seleccionada No puede ser Menor a la Fecha Actual");
fecha=$('#fecha_solicitud').val(fechaactual);

}

}



function edad_aspirante(){
  
  var fechaNacimiento=$(fecha_nacimiento).val();
  var edad_aspirante=0;
      

  function addZero(i) {
      if (i < 10) {
          i = "0" + i;
      }
      return i;
  }
  var d = new Date();
  var day = addZero(d.getDate());
  var month = addZero(d.getMonth()+1);
  var year = addZero(d.getFullYear());
  fechaactual= year + "-" + month + "-" + day
  edad_aspirante=fechaactual-fechaNacimiento;


  alert (fechaNacimiento);
  


  }




function llamar_ficha(id_user){

  $("#ficha_trabajador").modal("show");
  $("#ficha_trabajador").find('.modal-title').text("Ficha del Trabajador: " );

  var datos= {id_user: id_user,bandera:'obtener_ci_ficha'}
    $.ajax({
      type: "POST",
      url: "./../funciones/editarSolicitud.php",
      data: datos,
      success: function (r) {
        
        var bandera=(r.substr(0, 2));
          //alert(bandera);
        if ( bandera == '1#') {
            var registro=r.substr(2);  
          sap3(registro);   
        //alert(registro);
            
        }else {
            
          $('#ficha_trabajador').modal('hide');

          alert("Error en SAP " +"#"+r+"#");

        }
      }
    });         
    


}

function sap3(cedula){
    var url="../funciones/buscarSap.php";

$("#ficha_trabajador").find('#ced_trabajador').text("" );
              $("#ficha_trabajador").find('#ced_nombre').text("" );
              $("#ficha_trabajador").find('#ced_sexo').text("" );
              $("#ficha_trabajador").find('#ced_nacionalidad_trabajador').text("" );
              $("#ficha_trabajador").find('#ced_tfl').text("" );
              $("#ficha_trabajador").find('#ced_correo').text("" );
              $("#ficha_trabajador").find('#ced_gerencia_trabajador').text("" );
              $("#ficha_trabajador").find('#ced_area_nombre').text("" );
            $("#ficha_trabajador").find('#ced_cargo_empleado').text("" );
            $("#ficha_trabajador").find('#ced_centro_costo').text("" );
            $("#ficha_trabajador").find('#ced_id_trabajador').text("" );
            $("#ficha_trabajador").find('#ced_status_empleado').text("" );
              $("#ficha_trabajador").find('#ced_nombre_supervisor').text("" );
    
    $.getJSON(url,{cedula : cedula, busca_user: "busca_user" },function(empleado){
  
  $.each(empleado, function(i,empleados){
              $("#ficha_trabajador").find('#ced_trabajador').text(empleados.cedula );
              $("#ficha_trabajador").find('#ced_nombre').text(empleados.nombre_empleado );
              $("#ficha_trabajador").find('#ced_sexo').text(empleados.sexo );
              $("#ficha_trabajador").find('#ced_nacionalidad_trabajador').text(empleados.nacionalidad ); 
              $("#ficha_trabajador").find('#ced_tfl').text(empleados.telefono);
              $("#ficha_trabajador").find('#ced_correo').text(empleados.correo_personal);
              $("#ficha_trabajador").find('#ced_gerencia_trabajador').text(empleados.unidad_trabajo);
              $("#ficha_trabajador").find('#ced_area_nombre').text(empleados.area_cargo);
            $("#ficha_trabajador").find('#ced_cargo_empleado').text(unescape(encodeURIComponent(empleados.cargo)));
            $("#ficha_trabajador").find('#ced_centro_costo').text(empleados.centro_costo);
            $("#ficha_trabajador").find('#ced_id_trabajador').text(empleados.numero_personal);
            $("#ficha_trabajador").find('#ced_status_empleado').text(empleados.status_empleado);
            $("#ficha_trabajador").find('#ced_nombre_supervisor').text(empleados.nombre_supervisor);
            
              
            if ((empleados.cedula)==''){
                
                  $('#ficha_trabajador').modal('hide');

                  alert("Error en captura SAP ");
            }
              
          llamar_foto(empleados.cedula);

            
            // $("#nom_chofer").val(empleados.nombre_empleado);
            // $("#ced_chofer").val(empleados.cedula);
            
            });
});

    
} 
  function llamar_foto(ci_b){
    
    var datos= {ci_b: ci_b}
    $.ajax({
      type: "POST",
      url: "./../funciones/buscaFoto.php",
      data: datos,
      success: function (r) {
        
          $("#poner_foto").html(r);
        
        }
      
    });         
    
    
}
function llama_tipo(){
    var tipo=$("#id_pase").val();
    if ((tipo=='1')||(tipo=='2')||(tipo=='')){
        document.getElementById('ver_propietraio').style.display="none";
        $("input[type='radio'][name='tip_propietario'][value='PQV']").prop('checked',true);
        document.getElementById('particular').style.visibility='hidden';
          if (tipo=='2'){
                    $("#destino").val("12");
            document.getElementById("destino").disabled=true;
              
              document.getElementById('destino_descrip').style.display="block";
              document.getElementById('destino_descrip').style.visibility='visible';
          }else{
            document.getElementById("destino").disabled=false;
          }
    }else{
          $("#destino").val("12");
            document.getElementById("destino").disabled=true;
            document.getElementById('destino_descrip').style.display="block";
              document.getElementById('destino_descrip').style.visibility='visible';  
        
        document.getElementById('ver_propietraio').style.display="block";
        
        document.getElementById('ver_propietraio').style.display="block";
        
        $("input[type='radio'][name='tip_propietario'][value='PART']").prop('checked',true);
        document.getElementById('particular').style.visibility='visible';
        
          
    }
    
    
}

function devolver_pase(){
    var n_control='<?php echo $n_control_m;?>';
    alertify.confirm('Rechazar Solicitud', 'Esta Seguro de Rechazar la Solicitud: '+n_control+'?',function () { rechazar_orden_verificador(); }, function () { alertify.error('Se cancelo el rechazo') }).set('labels', { ok: 'Rechazar', cancel: 'Cancelar' });
}

</script>