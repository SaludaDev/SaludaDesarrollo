function CargaHorarios(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/HorariosG.php","",function(data){
      $("#HorariosCampanas").html(data);
    })
  
  }
  
  
  
  CargaHorarios();

  
