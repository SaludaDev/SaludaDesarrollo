function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/IntendenciaBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    