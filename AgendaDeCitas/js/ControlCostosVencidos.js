function CargaCostos(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/CostosVencidos.php","",function(data){
      $("#CostosEspeciales").html(data);
    })
  
  }
  
  
  
  CargaCostos();

  
