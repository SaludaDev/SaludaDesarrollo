function  HistorialCajas(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/HistorialCajas.php","",function(data){
      $("#CajasHistoricas").html(data);
    })

  }
  
  
  
  HistorialCajas();