function CargaAltaPacientes(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/AltadePacientes.php","",function(data){
      $("#tabla").html(data);
    })
  
  }
  
  
  
  CargaAltaPacientes();

  
