function CargaCampanas(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/CampanasViejas.php","",function(data){
      $("#TableCampanas").html(data);
    })
  
  }
  
  
  
  CargaCampanas();

  
