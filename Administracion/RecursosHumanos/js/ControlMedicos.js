function CargaEmpleados(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/Medicos.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  