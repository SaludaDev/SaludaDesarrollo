function CargaPacientes(){


    $.get("https://controlconsulta.com/Enfermeria2/Consultas/Pacientes.php","",function(data){
      $("#tabla").html(data);
    })
  
  }
  
  
  
  CargaPacientes();

  
