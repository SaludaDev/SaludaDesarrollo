function CargaSignosVitales(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/SignosVitalesMasHojaDiaria.php","",function(data){
      $("#sv").html(data);
    })
  
  }
  
  
  CargaSignosVitales();

  
