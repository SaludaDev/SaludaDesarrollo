function CargaEmpleados(){
    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/Medicos.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  