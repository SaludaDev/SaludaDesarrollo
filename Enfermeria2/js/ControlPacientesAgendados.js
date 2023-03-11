function CargaPacientesAgenda(){


    $.post("https://saludaclinicas.com/Enfermeria2/Consultas/AgendaPacientesCompletos.php","",function(data){
      $("#Pacientes").html(data);
    })
  
  }
  
  
  
  CargaPacientesAgenda();

  
