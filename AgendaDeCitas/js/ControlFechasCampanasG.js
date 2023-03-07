function CargaFechas(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/FechasGenerales.php","",function(data){
      $("#FechasCampanas").html(data);
    })
  
  }
  
  
  
  CargaFechas();

  
