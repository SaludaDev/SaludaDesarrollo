function CargaEmpleados(){
    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/Intendentes.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  