function CargaEmpleados(){
    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/Enfermeros.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  