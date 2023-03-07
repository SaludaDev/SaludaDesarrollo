function CargaFechas(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/Fechas.php","",function(data){
      $("#FechasCampanas").html(data);
    })
  
  }
  
  
  
  CargaFechas();

  
