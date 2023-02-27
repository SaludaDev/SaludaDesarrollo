function CargaSignosVitales(){


    $.get("https://controlconsulta.com/Enfermeria2/Consultas/SignosVitales.php","",function(data){
      $("#sv").html(data);
    })
  
  }
  
  
  CargaSignosVitales();

  
