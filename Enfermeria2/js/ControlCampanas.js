function CargaCampanas(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/Campanas.php","",function(data){
      $("#TablaCampanas").html(data);
    })
  
  }
  
  
  
  CargaCampanas();

  
