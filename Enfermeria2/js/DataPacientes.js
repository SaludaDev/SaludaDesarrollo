function   CargaAltaPacientes(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/DataPacientes.php","",function(data){
      $("#Pacientes").html(data);
    })
  
  }
  
  
  CargaAltaPacientes();

  

  
