function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AdminPOS/Consultas/MedicosBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  