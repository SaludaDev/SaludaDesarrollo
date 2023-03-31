function  StockPorSucursales(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/InventariosDescarga.php","",function(data){
      $("#TableStockSucursales").html(data);
    })

  }
  
  
  
  StockPorSucursales();