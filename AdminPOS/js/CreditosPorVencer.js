function CargaCreditosPorVencer(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/CreditosPorVencer.php","",function(data){
      $("#tablaCreditosPorVencer").html(data);
    })

  }
  
  
  
  CargaCreditosPorVencer();