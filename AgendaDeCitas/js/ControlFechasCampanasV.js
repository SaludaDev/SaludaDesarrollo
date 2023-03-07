function CargaFechas(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/FechasVencidas.php","",function(data){
      $("#FechasCampanas").html(data);
    })
  
  }
  
  
  
  CargaFechas();

  
