function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/EnfermerosBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  