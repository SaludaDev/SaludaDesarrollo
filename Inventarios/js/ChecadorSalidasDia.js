function CargaChecadorSalidaDia(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/ChecadorDiaSalidas","",function(data){
      $("#SalidasPersonal").html(data);
    })
  
  }
  
  
  CargaChecadorSalidaDia();

  
