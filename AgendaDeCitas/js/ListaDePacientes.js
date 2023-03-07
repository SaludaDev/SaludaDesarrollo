function CargaDatadePX(){


    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/DataPacientesGeneral.php","",function(data){
      $("#DataPacientes").html(data);
    })
  
  }
  
  
  CargaDatadePX();

  
