function CargaSucursales(){


    $.get("https://saludaclinicas.com/Controldecitas/Consultas/Sucursales.php","",function(data){
      $("#SucursalesEspecialistas").html(data);
    })
  
  }
  
  
  
  CargaSucursales();

  
