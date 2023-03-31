function CargaProveedores(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/Proveedores.php","",function(data){
      $("#tablaEmpleados").html(data);
    })
  
  }
  
  
  
  CargaProveedores();

  