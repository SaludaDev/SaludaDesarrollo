function CargaSignosVitales(){


    $.get("https://saludaclinicas.comAdminPOS/Consultas/RegistroDeEntradasPorDiasHuellas.php","",function(data){
      $("#RegistrosEntradas").html(data);
    })
  
  }
  
  
  CargaSignosVitales();

  
