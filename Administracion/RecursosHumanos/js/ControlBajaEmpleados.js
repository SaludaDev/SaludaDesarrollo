function CargaEmpleadosBajas(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/EmpleadosBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  