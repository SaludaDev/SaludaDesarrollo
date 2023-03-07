function CargaHorariosH(){


    $.get("https://saludaclinicas.com/Controldecitas/Consultas/HorariosH.php","",function(data){
      $("#HorariosCampanas").html(data);
    })
  
  }
  
  
  
  CargaHorariosH();

  
