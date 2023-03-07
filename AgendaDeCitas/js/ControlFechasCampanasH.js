function CargaFechasH(){


    $.get("https://saludaclinicas.com/Controldecitas/Consultas/FechasH.php","",function(data){
      $("#FechasCampanas").html(data);
    })
  
  }
  
  
  
  CargaFechasH();

  
