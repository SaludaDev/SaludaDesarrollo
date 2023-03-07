function CargaEmpleados(){
    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/CallCenter.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  