function  StockPorSucursales(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/StockSucursales.php","",function(data){
      $("#TableStockSucursales").html(data);
    })

  }
  
  
  
  StockPorSucursales();