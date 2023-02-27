function CargaEmpleadosBajas(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/RolesBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  