function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AdminPOS/Consultas/EnfermerosBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  