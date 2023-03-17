function IngresosProductos(){


    $.get("https://saludaclinicas.com/AdminPOS/Consultas/IngresosProductos.php","",function(data){
      $("#TableStockSucursales").html(data);
    })
  
  }
  
  
  IngresosProductos();

  
