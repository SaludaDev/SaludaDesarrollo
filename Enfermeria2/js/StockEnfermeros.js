function CargaStock(){


    $.get("https://saludaclinicas.com/Enfermeria2/Consultas/StockEnfermeros.php","",function(data){
      $("#StockEnfermeros").html(data);
    })
  
  }
  
  
  CargaStock();

  
