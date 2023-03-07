function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/MedicosBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  