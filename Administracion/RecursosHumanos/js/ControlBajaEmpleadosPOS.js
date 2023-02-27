function CargaEmpleadosBajas(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/EmpleadosBajasPOS.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  