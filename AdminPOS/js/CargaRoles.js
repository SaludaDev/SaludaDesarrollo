function CargaEmpleados(){
    $.get("https://saludaclinicas.com/AdminPOS/Consultas/Roles.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  