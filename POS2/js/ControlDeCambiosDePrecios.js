function  StockPorSucursales(){


    $.post("https://controlfarmacia.com/POS2/Consultas/CambiosDePrecios.php","",function(data){
      $("#TableStockSucursales").html(data);
    })

  }
  
  
  
  StockPorSucursales();