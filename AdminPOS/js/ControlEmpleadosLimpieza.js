function CargaEmpleados(){
    $.get("https://saludaclinicas.com/AdminPOS/Consultas/Intendentes.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  