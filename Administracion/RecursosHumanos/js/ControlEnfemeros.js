function CargaEmpleados(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/Enfermeros.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  