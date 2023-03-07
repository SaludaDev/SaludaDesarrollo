function CargaCampanas(){


    $.get("https://saludaclinicas.com/Controldecitas/Consultas/Campanas.php","",function(data){
      $("#TablaCampanas").html(data);
    })
  
  }
  
  
  
  CargaCampanas();

  
