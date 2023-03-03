function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/CallCenterBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    