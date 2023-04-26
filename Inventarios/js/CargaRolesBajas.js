function CargaEmpleadosBajas(){
    $.get("https://saludaclinicas.com/AdminPOS/Consultas/RolesBajas.php","",function(data){
        $("#tablaEmpleadosBajas").html(data);
      })
      }
    CargaEmpleadosBajas();
  
    
    
    
  