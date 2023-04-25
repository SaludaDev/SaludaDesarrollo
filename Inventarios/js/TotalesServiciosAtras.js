function CargaTotalesServ(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/TotalesServiciosAtras.php","",function(data){
      $("#TableTotalesServG").html(data);
    })

  }
  
  
  
  CargaTotalesServ();