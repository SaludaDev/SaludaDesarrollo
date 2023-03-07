function CargaCostosH(){


    $.get("https://saludaclinicas.com/Controldecitas/Consultas/CostosH.php","",function(data){
      $("#CostosEspeciales").html(data);
    })
  
  }
  
  
  
  CargaCostosH();

  
