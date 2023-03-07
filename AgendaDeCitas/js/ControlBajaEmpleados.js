function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/EmpleadosBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  