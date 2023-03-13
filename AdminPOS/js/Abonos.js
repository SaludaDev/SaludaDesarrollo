function CargaAbonos(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/Abonos.php","",function(data){
      $("#tablaAbonos").html(data);
    })

  }
  
  
  
  CargaAbonos();