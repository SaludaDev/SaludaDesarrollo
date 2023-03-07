function CargaCampanasCanceladas(){


    $.get("https://saludaclinicas.com/Controldecitas/Consultas/CampanasCanceladas.php","",function(data){
      $("#TablaCampanas").html(data);
    })
  
  }
  
  
  
  CargaCampanasCanceladas();

  
