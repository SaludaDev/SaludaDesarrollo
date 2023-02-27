function CargaEmpleados(){
    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/JefesEnfermeros.php","",function(data){
        $("#tablaEmpleados").html(data);
      })
      }
    CargaEmpleados();
  
    
    
    
  