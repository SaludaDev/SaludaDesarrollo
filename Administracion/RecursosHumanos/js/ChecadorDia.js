function CargaChecadorEntradaDia(){


    $.get("https://www.somosgrupoe.com/Administracion/RecursosHumanos/Consultas/ChecadorDia","",function(data){
      $("#EntradasPersonal").html(data);
    })
  
  }
  
  
  CargaChecadorEntradaDia();

  
