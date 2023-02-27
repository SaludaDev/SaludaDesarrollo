function CargaAltaPacientes(){


    $.get("https://controlconsulta.com/Enfermeria2/Consultas/AltadePacientes.php","",function(data){
      $("#tabla").html(data);
    })
  
  }
  
  
  
  CargaAltaPacientes();

  
