function CargaSignosVitales(){


    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/RegistroDeEntradasPorDiasHuellas.php","",function(data){
      $("#RegistrosEntradas").html(data);
    })
  
  }
  
  
  CargaSignosVitales();

  
