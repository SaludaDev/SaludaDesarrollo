function  StockPorSucursales(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/VistaAjustesInventarios.php","",function(data){
      $("#TableStockSucursales").html(data);
    })

  }
  
  
  
  StockPorSucursales();