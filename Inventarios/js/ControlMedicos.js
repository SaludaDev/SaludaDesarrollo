function CargaEmpleados(){
    $.get("https://saludaclinicas.com/AdminPOS/Consultas/Medicos.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  