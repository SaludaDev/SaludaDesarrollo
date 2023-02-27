function CargaEmpleados(){


    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/EmpleadosPOS.php","",function(data){
      $("#tablaEmpleados").html(data);
    })
  
  }
  
  
  
  CargaEmpleados();

  
  
  
