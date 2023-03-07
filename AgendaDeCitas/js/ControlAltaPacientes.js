function CargaAltaPacientes(){


    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/AltadePacientes.php","",function(data){
      $("#tabla").html(data);
    })
  
  }
  
   
  
  CargaAltaPacientes();

  
