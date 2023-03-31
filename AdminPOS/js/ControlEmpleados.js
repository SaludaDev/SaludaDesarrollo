function CargaEmpleados(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/Empleados.php","",function(data){
      $("#tablaEmpleados").html(data);
    })
  
  }
  
  
  
  CargaEmpleados();

  
  
  
