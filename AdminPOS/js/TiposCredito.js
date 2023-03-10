function CargaTipCredi(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/TiposCredito.php","",function(data){
      $("#tablaCreditos").html(data);
    })

  }
  
  
  
  CargaTipCredi();