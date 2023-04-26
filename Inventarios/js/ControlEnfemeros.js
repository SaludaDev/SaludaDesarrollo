function CargaEmpleados(){
    $.get("https://saludaclinicas.com/AdminPOS/Consultas/Enfermeros.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  