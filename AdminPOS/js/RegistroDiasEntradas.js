function CargaSignosVitales(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/RegistroDeEntradasPorDiasHuellas.php","",function(data){
      $("#RegistrosEntradas").html(data);
    })
  
  }
  
  
  CargaSignosVitales();

  
