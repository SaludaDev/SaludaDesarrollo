function CargaEmpleados(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/Roles.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  