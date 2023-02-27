function  StockPorSucursales(){


    $.post("https://controlconsulta.com/Medicos/Consultas/StockSucursalesV2.php","",function(data){
      $("#TableStockSucursales").html(data);
    })

  }
  
  
  
  StockPorSucursales();