function CargaSignosVitales(){


    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/RegistroPorDias.php","",function(data){
      $("#sv").html(data);
    })
  
  }
  
  
  CargaSignosVitales();

  
 