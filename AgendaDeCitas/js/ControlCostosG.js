function CargaCostos(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/CostosG.php","",function(data){
      $("#CostosEspeciales").html(data);
    })
  
  }
  
  
  
  CargaCostos();

  
