function CargaHorarios(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/HorariosV.php","",function(data){
      $("#HorariosCampanas").html(data);
    })
  
  }
  
  
  
  CargaHorarios();

  
