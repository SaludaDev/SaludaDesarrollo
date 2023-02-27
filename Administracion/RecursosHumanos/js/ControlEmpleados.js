function CargaEmpleados(){


    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/Empleados.php","",function(data){
      $("#tablaEmpleados").html(data);
    })
  
  }
  
  
  
  CargaEmpleados();

  
  
  
