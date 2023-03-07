function CargaEmpleados(){


    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/Empleados.php","",function(data){
      $("#tablaEmpleados").html(data);
    })
  
  }
  
  
  
  CargaEmpleados();

  
  
  
