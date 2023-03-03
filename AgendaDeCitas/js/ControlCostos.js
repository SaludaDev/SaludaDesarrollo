function CargaCostos(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/Costos.php","",function(data){
      $("#CostosEspeciales").html(data);
    })
  
  }
  
  
  
  CargaCostos();

  
