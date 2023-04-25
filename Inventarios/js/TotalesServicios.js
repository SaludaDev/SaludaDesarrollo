function CargaTotales(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/TotalesServicios.php","",function(data){
      $("#TableTotalesServ").html(data);
    })

  }
  
  
  
  CargaTotales();