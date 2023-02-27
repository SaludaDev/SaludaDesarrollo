function CargaPacientesAgendaV2(){


    $.post("https://controlconsulta.com/Enfermeria2/Consultas/CampanasDiasV2.php","",function(data){
      $("#TablaCampanasV2").html(data);
    })
  
  }
  
  
  
  CargaPacientesAgendaV2();
