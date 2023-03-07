function CargaPacientesAgenda(){


    $.post("https://saludaclinicas.com/ControldecitasV2/Consultas/AgendaPacientesCompletos.php","",function(data){
      $("#Pacientes").html(data);
    })
  
  }
  
  
  
  CargaPacientesAgenda();

  
