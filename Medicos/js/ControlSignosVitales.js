function CargaSignosVitales(){


    $.get("https://controlconsulta.com/Medicos/Consultas/PacientesEnTurno.php","",function(data){
      $("#sv").html(data);
    })
  
  }
  
  
  CargaSignosVitales();

  
