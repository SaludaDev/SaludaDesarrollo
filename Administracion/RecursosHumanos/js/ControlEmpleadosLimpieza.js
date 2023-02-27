function CargaEmpleados(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/Intendentes.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  