function   CargaAltaPacientes(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/DataPacientes.php","",function(data){
      $("#Pacientes").html(data);
    })
  
  }
  
  
  CargaAltaPacientes();

  

  
