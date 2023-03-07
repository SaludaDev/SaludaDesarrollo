function CargaCampanasH(){


    $.get("https://saludaclinicas.com/Controldecitas/Consultas/HistorialCitas.php","",function(data){
      $("#TablaCampanas").html(data);
    })
  
  }
  
  
  
  CargaCampanasH();

  
