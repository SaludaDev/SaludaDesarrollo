function CargaEmpleadosBajas(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/JefeEnfermerosBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  