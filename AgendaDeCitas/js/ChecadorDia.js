function CargaChecadorEntradaDia(){


    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/ChecadorDia","",function(data){
      $("#EntradasPersonal").html(data);
    })
  
  }
  
  
  CargaChecadorEntradaDia();

  
