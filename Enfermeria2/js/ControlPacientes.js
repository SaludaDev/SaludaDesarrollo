function CargaPacientes(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/Pacientes.php","",function(data){
      $("#tabla").html(data);
    })
  
  }
  
  
  
  CargaPacientes();

  
