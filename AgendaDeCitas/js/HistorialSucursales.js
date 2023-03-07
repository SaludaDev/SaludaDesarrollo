function CargaSucursalesH(){


    $.get("https://saludaclinicas.com/ControldecitasV2/Consultas/SucursalesH.php","",function(data){
      $("#SucursalesH").html(data);
    })
  
  }
  
  
  
  CargaSucursalesH();

  
