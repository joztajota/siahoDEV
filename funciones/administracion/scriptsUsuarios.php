<script>
function sap1(){
   
        var url="funciones/administracion/webServices/buscarSap.php";
        var cedula =$("#cedula_usuario").val();
       //alert(cedula);
              
       $.getJSON(url,{cedula : cedula, busca_user: "busca_user" },function(empleado){
			    
			$.each(empleado, function(i,empleados){
                 $("#npersonal").val(empleados.numero_personal);
                 $("#cargo_usuario").val(empleados.cargo);
                $("#telefono_usuario").val(empleados.telefono);
                $("#correo_usuario").val(empleados.correo_personal);
                 $("#nombre_usuario").val(empleados.nombre);
                 $("#apellido_usuario").val(empleados.apellido);
                
                });
		});
	
            
    
    
    }
</script>