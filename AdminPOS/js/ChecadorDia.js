function CargaChecadorEntradaDia(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/ChecadorDia","",function(data){
      $("#EntradasPersonal").html(data);
    })
  
  }
  
  
  CargaChecadorEntradaDia();

  
