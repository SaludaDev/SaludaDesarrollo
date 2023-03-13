function CargaAgenda(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/AgendaDePacientesNuevosV3.php","",function(data){
      $("#PacientesAgendados").html(data);
    })
  
  }
  
  
  
  CargaAgenda();

  
