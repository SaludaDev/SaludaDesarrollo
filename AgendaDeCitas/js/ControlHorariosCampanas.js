function CargaHorarios(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/Horarios.php","",function(data){
      $("#HorariosCampanas").html(data);
    })
  
  }
  
  
  
  CargaHorarios();

  
