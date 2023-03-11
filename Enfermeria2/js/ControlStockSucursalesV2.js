function  StockPorSucursales(){


    $.post("https://saludaclinicas.com/POS2/Consultas/StockSucursalesV2.php","",function(data){
      $("#TableStockSucursales").html(data);
    })

  }
  
  
  
  StockPorSucursales();