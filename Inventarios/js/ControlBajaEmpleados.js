function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AdminPOS/Consultas/EmpleadosBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  