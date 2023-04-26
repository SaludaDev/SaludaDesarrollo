function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AdminPOS/Consultas/IntendenciaBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    