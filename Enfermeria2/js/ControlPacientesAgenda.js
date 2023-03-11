function PacientesAgenda(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/SignosVitalesEspeciales.php","",function(data){
      $("#PacAgen").html(data);
    })
  
  }
  
  
  
  PacientesAgenda();

  
