function CargaEmpleadosBajas(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/IntendenciaBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    