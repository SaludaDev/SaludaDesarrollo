function CargaPacientesNuevos(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/PacientesNuevoSig.php","",function(data){
      $("#DataSignos").html(data);
    })
  
  }
  
  
  
  CargaPacientesNuevos();

  
