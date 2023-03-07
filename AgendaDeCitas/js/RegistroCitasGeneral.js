function CargaSignosVitalesLibre(){


    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/RegistroLibre.php","",function(data){
      $("#sv").html(data);
    })
  
  }
  
  
  CargaSignosVitalesLibre();

  
