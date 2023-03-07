function CargaChecadorEntradaDia(){


    $.get("https://saludaclinicas.com/AgendaDeCitas/Consultas/logsDia","",function(data){
      $("#EntradasPersonal").html(data);
    })
  
  }
  
  
  CargaChecadorEntradaDia();

  
