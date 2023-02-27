function CargaSalidas(){


    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/RegistroDeSalidasPorDiasHuellas.php","",function(data){
      $("#RegistrosSalidas").html(data);
    })
  
  }
  
  
  CargaSalidas();

  
